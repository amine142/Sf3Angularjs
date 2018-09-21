<?php declare(strict_types=1);

namespace App\DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version1_init_20180921_sql extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $this->addSql("CREATE SEQUENCE utilisateur_id_seq INCREMENT BY 1 MINVALUE 1 START 1;");
        $this->addSql("CREATE TABLE utilisateur (id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL, roles JSON DEFAULT NULL, PRIMARY KEY(id));");
        $this->addSql("CREATE UNIQUE INDEX UNIQ_1D1C63B3E7927C74 ON utilisateur (email);");
        $this->addSql(" COMMENT ON COLUMN utilisateur.roles IS '(DC2Type:json_array)';");


    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
