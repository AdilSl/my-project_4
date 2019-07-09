<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190516103425 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE taille ADD CONSTRAINT FK_76508B3898260155 FOREIGN KEY (region_id) REFERENCES region (id)');
        $this->addSql('CREATE INDEX IDX_76508B3898260155 ON taille (region_id)');
        $this->addSql('ALTER TABLE region DROP FOREIGN KEY FK_F62F176D54FAE5E');
        $this->addSql('DROP INDEX UNIQ_F62F176D54FAE5E ON region');
        $this->addSql('ALTER TABLE region DROP titre_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE region ADD titre_id INT NOT NULL');
        $this->addSql('ALTER TABLE region ADD CONSTRAINT FK_F62F176D54FAE5E FOREIGN KEY (titre_id) REFERENCES taille (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F62F176D54FAE5E ON region (titre_id)');
        $this->addSql('ALTER TABLE taille DROP FOREIGN KEY FK_76508B3898260155');
        $this->addSql('DROP INDEX IDX_76508B3898260155 ON taille');
    }
}
