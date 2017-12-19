<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171219164535 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE auteurs');
        $this->addSql('DROP TABLE mots');
        $this->addSql('DROP TABLE rubriques');
        $this->addSql('DROP INDEX id_rubrique ON articles');
        $this->addSql('DROP INDEX id_secteur ON articles');
        $this->addSql('DROP INDEX statut ON articles');
        $this->addSql('ALTER TABLE articles CHANGE id_rubrique id_rubrique BIGINT NOT NULL, CHANGE date date DATETIME NOT NULL, CHANGE statut statut VARCHAR(10) NOT NULL, CHANGE id_secteur id_secteur BIGINT NOT NULL, CHANGE maj maj BIGINT NOT NULL, CHANGE date_redac date_redac DATETIME NOT NULL, CHANGE date_modif date_modif DATETIME NOT NULL');
        $this->addSql('DROP INDEX mode ON documents');
        $this->addSql('ALTER TABLE documents ADD status VARCHAR(500) NOT NULL, DROP statut, CHANGE id_document id_document INT AUTO_INCREMENT NOT NULL, CHANGE date date DATETIME NOT NULL, CHANGE taille taille BIGINT NOT NULL, CHANGE largeur largeur INT NOT NULL, CHANGE hauteur hauteur INT NOT NULL, CHANGE media media VARCHAR(500) NOT NULL, CHANGE mode mode VARCHAR(500) NOT NULL, CHANGE date_publication date_publication DATETIME NOT NULL, CHANGE maj maj DATETIME NOT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE auteurs (id_auteur BIGINT AUTO_INCREMENT NOT NULL, nom TEXT NOT NULL COLLATE utf8_general_ci, bio TEXT NOT NULL COLLATE utf8_general_ci, email TINYTEXT NOT NULL COLLATE utf8_general_ci, login VARCHAR(255) DEFAULT NULL COLLATE utf8_bin, pass TINYTEXT NOT NULL COLLATE utf8_general_ci, low_sec TINYTEXT NOT NULL COLLATE utf8_general_ci, statut VARCHAR(255) DEFAULT \'0\' NOT NULL COLLATE utf8_general_ci, webmestre VARCHAR(3) DEFAULT \'non\' NOT NULL COLLATE utf8_general_ci, maj DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, htpass TINYTEXT NOT NULL COLLATE utf8_general_ci, en_ligne DATETIME DEFAULT \'0000-00-00 00:00:00\' NOT NULL, INDEX login (login), INDEX statut (statut), INDEX en_ligne (en_ligne), PRIMARY KEY(id_auteur)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mots (id_mot BIGINT AUTO_INCREMENT NOT NULL, titre TEXT NOT NULL COLLATE utf8_general_ci, descriptif TEXT NOT NULL COLLATE utf8_general_ci, texte LONGTEXT NOT NULL COLLATE utf8_general_ci, PRIMARY KEY(id_mot)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rubriques (id_rubrique BIGINT AUTO_INCREMENT NOT NULL, titre TEXT NOT NULL COLLATE utf8_general_ci, descriptif TEXT NOT NULL COLLATE utf8_general_ci, texte LONGTEXT NOT NULL COLLATE utf8_general_ci, statut VARCHAR(10) DEFAULT \'0\' NOT NULL COLLATE utf8_general_ci, date DATETIME DEFAULT \'0000-00-00 00:00:00\' NOT NULL, lang VARCHAR(10) DEFAULT \'\' NOT NULL COLLATE utf8_general_ci, langue_choisie VARCHAR(3) DEFAULT \'non\' COLLATE utf8_general_ci, INDEX lang (lang), PRIMARY KEY(id_rubrique)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE articles CHANGE id_rubrique id_rubrique BIGINT DEFAULT 0 NOT NULL, CHANGE date date DATETIME DEFAULT \'0000-00-00 00:00:00\' NOT NULL, CHANGE statut statut VARCHAR(10) DEFAULT \'0\' NOT NULL COLLATE utf8_general_ci, CHANGE id_secteur id_secteur BIGINT DEFAULT 0 NOT NULL, CHANGE maj maj DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE date_redac date_redac DATETIME DEFAULT \'0000-00-00 00:00:00\' NOT NULL, CHANGE date_modif date_modif DATETIME DEFAULT \'0000-00-00 00:00:00\' NOT NULL');
        $this->addSql('CREATE INDEX id_rubrique ON articles (id_rubrique)');
        $this->addSql('CREATE INDEX id_secteur ON articles (id_secteur)');
        $this->addSql('CREATE INDEX statut ON articles (statut, date)');
        $this->addSql('ALTER TABLE documents ADD statut VARCHAR(10) DEFAULT \'0\' NOT NULL COLLATE utf8_general_ci, DROP status, CHANGE id_document id_document BIGINT AUTO_INCREMENT NOT NULL, CHANGE date date DATETIME DEFAULT \'0000-00-00 00:00:00\' NOT NULL, CHANGE taille taille BIGINT DEFAULT NULL, CHANGE largeur largeur INT DEFAULT NULL, CHANGE hauteur hauteur INT DEFAULT NULL, CHANGE media media VARCHAR(10) DEFAULT \'file\' NOT NULL COLLATE utf8_general_ci, CHANGE mode mode VARCHAR(10) DEFAULT \'document\' NOT NULL COLLATE utf8_general_ci, CHANGE date_publication date_publication DATETIME DEFAULT \'0000-00-00 00:00:00\' NOT NULL, CHANGE maj maj DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('CREATE INDEX mode ON documents (mode)');
    }
}
