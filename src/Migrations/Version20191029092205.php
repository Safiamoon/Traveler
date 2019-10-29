<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191029092205 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE pays (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE destination ADD pays_id INT NOT NULL, DROP pays');
        $this->addSql('ALTER TABLE destination ADD CONSTRAINT FK_3EC63EAAA6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id)');
        $this->addSql('CREATE INDEX IDX_3EC63EAAA6E44244 ON destination (pays_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE destination DROP FOREIGN KEY FK_3EC63EAAA6E44244');
        $this->addSql('DROP TABLE pays');
        $this->addSql('DROP INDEX IDX_3EC63EAAA6E44244 ON destination');
        $this->addSql('ALTER TABLE destination ADD pays VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP pays_id');
    }
}
