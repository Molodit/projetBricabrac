<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171220201408 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE article (idArticle INT AUTO_INCREMENT NOT NULL, ititre VARCHAR(200) NOT NULL, contenu LONGTEXT NOT NULL, rubrique VARCHAR(100) NOT NULL, cheminImage VARCHAR(400) NOT NULL, mot_cle VARCHAR(100) NOT NULL, datePublication DATETIME NOT NULL, dateModification DATETIME NOT NULL, auteur VARCHAR(200) NOT NULL, PRIMARY KEY(idArticle)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (idContact INT AUTO_INCREMENT NOT NULL, email VARCHAR(300) NOT NULL, nom VARCHAR(200) NOT NULL, message TINYTEXT NOT NULL, dateMessage DATETIME NOT NULL, PRIMARY KEY(idContact)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE membre (idMembre INT AUTO_INCREMENT NOT NULL, email VARCHAR(300) NOT NULL, pseudo VARCHAR(200) NOT NULL, password VARCHAR(200) NOT NULL, niveau INT NOT NULL, PRIMARY KEY(idMembre)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE membre');
    }
}
