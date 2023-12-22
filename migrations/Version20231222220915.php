<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231222220915 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE auteur CHANGE prenom prenom VARCHAR(50) DEFAULT NULL, CHANGE string nom VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE categorie CHANGE designation designation VARCHAR(50) DEFAULT NULL, CHANGE string description VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE editeur CHANGE telephone telephone INT NOT NULL');
        $this->addSql('ALTER TABLE livre DROP no, CHANGE nb_exemplaires nb_exemlpaires INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE auteur CHANGE prenom prenom VARCHAR(50) NOT NULL, CHANGE nom string VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE categorie CHANGE designation designation VARCHAR(50) NOT NULL, CHANGE description string VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE editeur CHANGE telephone telephone VARCHAR(10) NOT NULL');
        $this->addSql('ALTER TABLE livre ADD no VARCHAR(255) NOT NULL, CHANGE nb_exemlpaires nb_exemplaires INT DEFAULT NULL');
    }
}
