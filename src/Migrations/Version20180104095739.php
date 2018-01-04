<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180104095739 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX id_rubrique ON article');
        $this->addSql('DROP INDEX id_secteur ON article');
        $this->addSql('DROP INDEX statut ON article');
        $this->addSql('ALTER TABLE article CHANGE mot_cle mot_cle VARCHAR(100) NOT NULL, CHANGE date_publication date_publication DATETIME NOT NULL, CHANGE date_modification date_modification DATETIME NOT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article CHANGE mot_cle mot_cle VARCHAR(100) DEFAULT \'0\' NOT NULL COLLATE utf8_general_ci, CHANGE date_publication date_publication DATETIME DEFAULT \'0000-00-00 00:00:00\' NOT NULL, CHANGE date_modification date_modification DATETIME DEFAULT \'0000-00-00 00:00:00\' NOT NULL');
        $this->addSql('CREATE INDEX id_rubrique ON article (rubrique)');
        $this->addSql('CREATE INDEX id_secteur ON article (mot_cle)');
        $this->addSql('CREATE INDEX statut ON article (date_publication)');
    }
}
