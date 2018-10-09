<?php

namespace AppBundle\Services\Sso;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Guard\Token\PostAuthenticationGuardToken;
use Symfony\Component\Security\Guard\AuthenticatorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Routing\Router;
use Symfony\Bridge\Monolog\Logger;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class SsoAuthenticator implements AuthenticatorInterface
{

    /**
     * Tableau contenant les paramètres de configuraiton du sso
     * @var type array
     */
    private $sso;
    
    private $kernel;
    
    private $router;
    
    private $logger;

    private $container;
    
    public function __construct(Router $router, Kernel $kernel, Logger $logger, $sso, ContainerInterface $container) 
    {
        $this->kernel = $kernel;
        $this->router = $router;
        $this->logger = $logger;
        $this->sso = $sso;
        $this->container = $container;
    }
    
    /**
     * Called on every request. Return whatever credentials you want,
     * or null to stop authentication.
     */
    public function getCredentials(Request $request)
    {

        $credentials = array();
        
        $env = $this->kernel->getEnvironment();
        
        if ($env == 'dev') {
            $this->addSSOHeaders($request);
        }

        //Récupérer les données des entêtes de la requête
        $headers = $request->headers->all();
        
        //Extraire les données
        foreach ($this->sso['attributs'] as $key => $attribut) {
            $attr = strtolower($attribut);
            if (!array_key_exists($attr, $headers)){
                return;
            }else{
                if ($key == $this->sso['attributs']['droits']){
                    $credentials[$key] = $this->extractCredentials($headers[$attr][0]);
                    //si le tableau de droits est vide, on stoppe le process
                    if (empty($credentials[$this->sso['attributs']['droits']])){
                        return;
                    }
                    
                }else{
                    $credentials[$key] = $headers[$attr][0];
                }
            }
        }
        
        return $credentials;
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        return $userProvider->loadUserByMail($credentials['email'], $credentials);
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        return true;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        // on success, let the request continue
        return null;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception){
        $this->logger->error('AUTHENTICATION FAILURE: ' . var_export($request->headers->all(), true));
        throw new AccessDeniedHttpException();
    }

    /**
     * Called when authentication is needed, but it's not sent
     */
    public function start(Request $request, AuthenticationException $authException = null)
    {
        $this->logger->error('AUTHENTICATION FAILURE: ' . var_export($request->headers->all(), true));
        throw new AccessDeniedHttpException();
    }

    public function supportsRememberMe()
    {
        return false;
    }

    
    /*
     * Fonction de récupération des droits de la personne
     */
    private function extractCredentials($entete_profil) 
    {

        $credentials = array();

        if (isset($entete_profil) && !empty($entete_profil)) {
            $profils_tab = array();
            $paire = explode(";", $entete_profil);

            foreach ($paire as $k => $v) {
                list($appli, $profil) = explode(":", trim($v));
                $profils_tab[strtoupper($appli)][] = 'ROLE_' . strtoupper($profil);
            }
            $profil_groupe = strtoupper($this->sso['profil_groupe']);
            if (isset($profils_tab[$profil_groupe]))
                $credentials = $profils_tab[$profil_groupe];
        }

        return $credentials;
    }

    /*
     * Fonction d'ajout d'entêtes HTTP renvoyés pour le SSO: bouchon 
     */
    private function addSSOHeaders(Request $request) 
    {
        
        foreach (['user_email','user_roles'] as $tag){
            // vérifie si un parametre est défini et renseigné
            if (!$this->container->hasParameter($tag) || $this->container->getParameter($tag) == '') {
                $this->logger->error('AUTHENTICATION FAILURE: ' . var_export($request->headers->all(), true));
                throw new AccessDeniedHttpException();
            }
        }
        
        $request->headers->add(
                array(
                    $this->sso['attributs']['username'] => 'ALVES',
                    $this->sso['attributs']['uid'] => '11111111',
                    $this->sso['attributs']['nom'] => 'ALVES',
                    $this->sso['attributs']['prenom'] => 'Eva',
                    $this->sso['attributs']['civilite'] => 'Mme',
                    $this->sso['attributs']['email'] => $this->container->getParameter('user_email'),
                    $this->sso['attributs']['droits'] => $this->container->getParameter('user_roles')
                )
        );
      
        return $request->headers->all();
        
    }

     /**
     * Shortcut to create a PostAuthenticationGuardToken for you, if you don't really
     * care about which authenticated token you're using.
     *
     * @param UserInterface $user
     * @param string        $providerKey
     *
     * @return PostAuthenticationGuardToken
     */
    public function createAuthenticatedToken(UserInterface $user, $providerKey)
    {
        return new PostAuthenticationGuardToken(
            $user,
            $providerKey,
            $user->getRoles()
        );
    }

    /**
     * {@inheritdoc}
     */
    public function supports(Request $request)
    {
        $env = $this->kernel->getEnvironment();
        
        if ($env == 'dev') {
            return true;
        }
        return false;
    }

}
