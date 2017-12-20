<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171220151857 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE auteurs (id_auteur INT AUTO_INCREMENT NOT NULL, nom TEXT NOT NULL, email LONGTEXT NOT NULL, login VARCHAR(255) NOT NULL, pass TINYTEXT NOT NULL, statut VARCHAR(255) NOT NULL, webmestre VARCHAR(3) NOT NULL, maj DATETIME NOT NULL, PRIMARY KEY(id_auteur)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rubriques (id_rubrique BIGINT AUTO_INCREMENT NOT NULL, titre LONGTEXT NOT NULL, descriptif LONGTEXT NOT NULL, texte LONGTEXT NOT NULL, statut VARCHAR(10) NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id_rubrique)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mots (id_mot BIGINT AUTO_INCREMENT NOT NULL, descriptif LONGTEXT NOT NULL, texte LONGTEXT NOT NULL, PRIMARY KEY(id_mot)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE auteurs');
        $this->addSql('DROP TABLE rubriques');
        $this->addSql('DROP TABLE mots');
    }
}
