<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171229093523 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article CHANGE id_article id_article INT AUTO_INCREMENT NOT NULL, CHANGE mot_cle mot_cle VARCHAR(100) NOT NULL, CHANGE date_publication date_publication DATETIME NOT NULL, CHANGE date_modification date_modification DATETIME NOT NULL, ADD PRIMARY KEY (id_article)');
        $this->addSql('ALTER TABLE comments CHANGE id_comment id_comment INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id_comment)');
        $this->addSql('ALTER TABLE membre ADD id_membre INT AUTO_INCREMENT NOT NULL, DROP idMembre, ADD PRIMARY KEY (id_membre)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article MODIFY id_article INT NOT NULL');
        $this->addSql('ALTER TABLE article DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE article CHANGE id_article id_article INT NOT NULL, CHANGE mot_cle mot_cle VARCHAR(100) DEFAULT \'0\' NOT NULL COLLATE utf8_general_ci, CHANGE date_publication date_publication DATETIME DEFAULT \'0000-00-00 00:00:00\' NOT NULL, CHANGE date_modification date_modification DATETIME DEFAULT \'0000-00-00 00:00:00\' NOT NULL');
        $this->addSql('ALTER TABLE comments MODIFY id_comment INT NOT NULL');
        $this->addSql('ALTER TABLE comments DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE comments CHANGE id_comment id_comment INT NOT NULL');
        $this->addSql('ALTER TABLE membre MODIFY id_membre INT NOT NULL');
        $this->addSql('ALTER TABLE membre DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE membre ADD idMembre INT NOT NULL, DROP id_membre');
    }
}
