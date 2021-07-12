<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210712152134 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE capteurs ADD patients_id INT NOT NULL');
        $this->addSql('ALTER TABLE capteurs ADD CONSTRAINT FK_9B30E2D6CEC3FD2F FOREIGN KEY (patients_id) REFERENCES patients (id)');
        $this->addSql('CREATE INDEX IDX_9B30E2D6CEC3FD2F ON capteurs (patients_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE capteurs DROP FOREIGN KEY FK_9B30E2D6CEC3FD2F');
        $this->addSql('DROP INDEX IDX_9B30E2D6CEC3FD2F ON capteurs');
        $this->addSql('ALTER TABLE capteurs DROP patients_id');
    }
}
