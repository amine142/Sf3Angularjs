<?php

namespace AppBundle\Services\Sso;

use \Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use AppBundle\Entity\User;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\DependencyInjection\ContainerInterface;


class SsoUserProvider implements UserProviderInterface{
    
    /**
     * @var Doctrine\ORM\EntityManager 
     */
    private $em;
    
    /**
     * @var Symfony\Component\DependencyInjection\ContainerInterface
     */
    private $container;
    
    public function __construct(EntityManager $em, ContainerInterface $container) 
    {
        $this->container = $container;
        $this->em = $em;
        
    }
    
    
    /**
     * 
     * @param type $username
     * @throws UsernameNotFoundException
     */
    public function loadUserByUsername($username){}
    
    /**
     * Génére un user à partir de son mail et compléte les données de la base à l'aide du tableau $additionnalInfos
     * @param type $email
     * @param type $additionnalInfos (informations non persistées en base de données)
     * @return User
     */
    public function loadUserByMail($email, $additionnalInfos){
        
        $user = $this->em->getRepository('AppBundle:User')->getOneByEmailCI($email);
        
        if (!$user){
            throw new UsernameNotFoundException(sprintf('Aucun utilisateur avec l\'email "%s" existe dans la base de données d\'NATACHA', $email));
        }
        
        //ajouter les autres attributs
        $user->setUsername($additionnalInfos['username']);
        $user->setUid($additionnalInfos['uid']);
        
        $existing_roles = $user->getRoles();
        $roles = $additionnalInfos['droits'];
        
        //formatage des roles pour entrée en Bdd
        foreach($roles as &$role){
          $role = preg_replace('/\#\d$/','' , $role)  ;
        }
        
        $changed = false;
        if (empty($existing_roles)) {
            $user->setRoles($roles);
        }else {
            $all_roles = [];
            $roles_hierarchy = $this->container->getParameter('security.role_hierarchy.roles');
            foreach ($roles_hierarchy as $key => $roles_hierarchy) {
                foreach ($existing_roles as $existing_role) {
                    if ($key === $existing_role) {
                        $all_roles += $roles_hierarchy;
                    }
                }
            }
            foreach($roles as &$role){
                if (!in_array($role, $all_roles)){
                    $changed = true;
                }
            }
        }
        if ($changed) {
            $user->setRoles($roles);
        }
        
        $this->em->persist($user);
        $this->em->flush(); 
        
        return $user;
        
    }

    /**
     * Refreshes the user for the account interface.
     *
     * It is up to the implementation to decide if the user data should be
     * totally reloaded (e.g. from the database), or if the UserInterface
     * object can just be merged into some internal array of users / identity
     * map.
     *
     * @param UserInterface $user
     *
     * @return UserInterface
     *
     * @throws UnsupportedUserException if the account is not supported
     */
    public function refreshUser(UserInterface $user){
        return $user;
    }

    /**
     * Whether this provider supports the given user class.
     *
     * @param string $class
     *
     * @return bool
     */
    public function supportsClass($class){
        return $class === 'AppBundle\Entity\Redacteur';
    }
    
    
    

}
