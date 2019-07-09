<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190517120740 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE couleur (id INT AUTO_INCREMENT NOT NULL, couleur VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE couleur_chaussure (couleur_id INT NOT NULL, chaussure_id INT NOT NULL, INDEX IDX_2971A8CEC31BA576 (couleur_id), INDEX IDX_2971A8CEF8458E35 (chaussure_id), PRIMARY KEY(couleur_id, chaussure_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE couleur_chaussure ADD CONSTRAINT FK_2971A8CEC31BA576 FOREIGN KEY (couleur_id) REFERENCES couleur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE couleur_chaussure ADD CONSTRAINT FK_2971A8CEF8458E35 FOREIGN KEY (chaussure_id) REFERENCES chaussure (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE couleur_chaussure DROP FOREIGN KEY FK_2971A8CEC31BA576');
        $this->addSql('DROP TABLE couleur');
        $this->addSql('DROP TABLE couleur_chaussure');
    }
}
