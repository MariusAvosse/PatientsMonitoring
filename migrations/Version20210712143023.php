<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210712143023 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE capteurs (id INT AUTO_INCREMENT NOT NULL, id_capteurs_id INT DEFAULT NULL, temperature_ambiante DOUBLE PRECISION DEFAULT NULL, humidite DOUBLE PRECISION DEFAULT NULL, mouvement DOUBLE PRECISION DEFAULT NULL, temperature_corporelle DOUBLE PRECISION DEFAULT NULL, rythme_cardiaque DOUBLE PRECISION DEFAULT NULL, INDEX IDX_9B30E2D6BDC6E01C (id_capteurs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lits (id INT AUTO_INCREMENT NOT NULL, num_lit INT NOT NULL, statut TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medecin (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenoms VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, code_generated VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patients (id INT AUTO_INCREMENT NOT NULL, id_medecin_id INT NOT NULL, id_lit_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenoms VARCHAR(255) NOT NULL, num_lit INT NOT NULL, INDEX IDX_2CCC2E2CA1799A53 (id_medecin_id), UNIQUE INDEX UNIQ_2CCC2E2C1BCE5BA (id_lit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE capteurs ADD CONSTRAINT FK_9B30E2D6BDC6E01C FOREIGN KEY (id_capteurs_id) REFERENCES patients (id)');
        $this->addSql('ALTER TABLE patients ADD CONSTRAINT FK_2CCC2E2CA1799A53 FOREIGN KEY (id_medecin_id) REFERENCES medecin (id)');
        $this->addSql('ALTER TABLE patients ADD CONSTRAINT FK_2CCC2E2C1BCE5BA FOREIGN KEY (id_lit_id) REFERENCES lits (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patients DROP FOREIGN KEY FK_2CCC2E2C1BCE5BA');
        $this->addSql('ALTER TABLE patients DROP FOREIGN KEY FK_2CCC2E2CA1799A53');
        $this->addSql('ALTER TABLE capteurs DROP FOREIGN KEY FK_9B30E2D6BDC6E01C');
        $this->addSql('DROP TABLE capteurs');
        $this->addSql('DROP TABLE lits');
        $this->addSql('DROP TABLE medecin');
        $this->addSql('DROP TABLE patients');
    }
}
