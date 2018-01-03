<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171229095515 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE comments (id_comment INT AUTO_INCREMENT NOT NULL, id_article VARCHAR(200) NOT NULL, id_membre INT NOT NULL, titre VARCHAR(200) NOT NULL, contenu LONGTEXT NOT NULL, date_publication DATETIME NOT NULL, PRIMARY KEY(id_comment)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE membre (id_membre INT AUTO_INCREMENT NOT NULL, email VARCHAR(300) NOT NULL, membre VARCHAR(200) NOT NULL, password VARCHAR(200) NOT NULL, niveau INT NOT NULL, PRIMARY KEY(id_membre)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article (id_article INT AUTO_INCREMENT NOT NULL, id_membre INT NOT NULL, titre VARCHAR(200) NOT NULL, contenu LONGTEXT NOT NULL, rubrique VARCHAR(100) NOT NULL, chemin_image VARCHAR(400) NOT NULL, mot_cle VARCHAR(100) NOT NULL, date_publication DATETIME NOT NULL, date_modification DATETIME NOT NULL, PRIMARY KEY(id_article)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE membre');
        $this->addSql('DROP TABLE article');
    }
}
