<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210712145956 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE capteurs DROP FOREIGN KEY FK_9B30E2D6BDC6E01C');
        $this->addSql('DROP INDEX IDX_9B30E2D6BDC6E01C ON capteurs');
        $this->addSql('ALTER TABLE capteurs DROP id_capteurs_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE capteurs ADD id_capteurs_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE capteurs ADD CONSTRAINT FK_9B30E2D6BDC6E01C FOREIGN KEY (id_capteurs_id) REFERENCES patients (id)');
        $this->addSql('CREATE INDEX IDX_9B30E2D6BDC6E01C ON capteurs (id_capteurs_id)');
    }
}
