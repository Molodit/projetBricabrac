<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180102080902 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE comments (id_comment INT AUTO_INCREMENT NOT NULL, id_article VARCHAR(200) NOT NULL, id_membre INT NOT NULL, titre VARCHAR(200) NOT NULL, contenu LONGTEXT NOT NULL, date_publication DATETIME NOT NULL, PRIMARY KEY(id_comment)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE contact');
        $this->addSql('ALTER TABLE article MODIFY idArticle INT NOT NULL');
        $this->addSql('ALTER TABLE article DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE article ADD id_membre INT NOT NULL, ADD titre VARCHAR(200) NOT NULL, ADD date_publication DATETIME NOT NULL, ADD date_modification DATETIME NOT NULL, DROP ititre, DROP datePublication, DROP dateModification, DROP auteur, CHANGE idarticle id_article INT AUTO_INCREMENT NOT NULL, CHANGE cheminimage chemin_image VARCHAR(400) NOT NULL');
        $this->addSql('ALTER TABLE article ADD PRIMARY KEY (id_article)');
        $this->addSql('ALTER TABLE membre MODIFY idMembre INT NOT NULL');
        $this->addSql('ALTER TABLE membre DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE membre CHANGE idmembre id_membre INT AUTO_INCREMENT NOT NULL, CHANGE pseudo membre VARCHAR(200) NOT NULL');
        $this->addSql('ALTER TABLE membre ADD PRIMARY KEY (id_membre)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE contact (idContact INT AUTO_INCREMENT NOT NULL, email VARCHAR(300) NOT NULL COLLATE utf8_unicode_ci, nom VARCHAR(200) NOT NULL COLLATE utf8_unicode_ci, message TINYTEXT NOT NULL COLLATE utf8_unicode_ci, dateMessage DATETIME NOT NULL, PRIMARY KEY(idContact)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE comments');
        $this->addSql('ALTER TABLE article MODIFY id_article INT NOT NULL');
        $this->addSql('ALTER TABLE article DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE article ADD datePublication DATETIME NOT NULL, ADD dateModification DATETIME NOT NULL, ADD auteur VARCHAR(200) NOT NULL COLLATE utf8_unicode_ci, DROP id_membre, DROP date_publication, DROP date_modification, CHANGE id_article idArticle INT AUTO_INCREMENT NOT NULL, CHANGE titre ititre VARCHAR(200) NOT NULL COLLATE utf8_unicode_ci, CHANGE chemin_image cheminImage VARCHAR(400) NOT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE article ADD PRIMARY KEY (idArticle)');
        $this->addSql('ALTER TABLE membre MODIFY id_membre INT NOT NULL');
        $this->addSql('ALTER TABLE membre DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE membre CHANGE id_membre idMembre INT AUTO_INCREMENT NOT NULL, CHANGE membre pseudo VARCHAR(200) NOT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE membre ADD PRIMARY KEY (idMembre)');
    }
}
