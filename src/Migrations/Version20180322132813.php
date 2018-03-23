<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180322132813 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE articles_images (id_article INT NOT NULL, id_image INT NOT NULL, INDEX IDX_5A276A47DCA7A716 (id_article), INDEX IDX_5A276A472BB8456F (id_image), PRIMARY KEY(id_article, id_image)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE articles_images ADD CONSTRAINT FK_5A276A47DCA7A716 FOREIGN KEY (id_article) REFERENCES article (id_article)');
        $this->addSql('ALTER TABLE articles_images ADD CONSTRAINT FK_5A276A472BB8456F FOREIGN KEY (id_image) REFERENCES images (id_image)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE articles_images');
    }
}
