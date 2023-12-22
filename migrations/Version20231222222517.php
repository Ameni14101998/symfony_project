<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231222222517 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE livre_auteur (livre_id INT NOT NULL, auteur_id INT NOT NULL, INDEX IDX_A11876B537D925CB (livre_id), INDEX IDX_A11876B560BB6FE6 (auteur_id), PRIMARY KEY(livre_id, auteur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE livre_auteur ADD CONSTRAINT FK_A11876B537D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livre_auteur ADD CONSTRAINT FK_A11876B560BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE auteur ADD email VARCHAR(255) NOT NULL, DROP biographie, CHANGE prenom prenom VARCHAR(255) DEFAULT NULL, CHANGE nom nom VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE categorie DROP description, CHANGE designation designation VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE editeur ADD num_tel BIGINT DEFAULT NULL, DROP pays, DROP telephone, CHANGE nom_editeur nom_editeur VARCHAR(50) NOT NULL, CHANGE adresse adresse VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE livre ADD categorie_id INT DEFAULT NULL, ADD editeur_id INT NOT NULL, ADD qte INT NOT NULL, DROP nb_pages, DROP date_edition, DROP nb_exemlpaires, CHANGE titre titre VARCHAR(255) NOT NULL, CHANGE prix prix DOUBLE PRECISION NOT NULL, CHANGE isbn isbn INT DEFAULT NULL');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F99BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F993375BD21 FOREIGN KEY (editeur_id) REFERENCES editeur (id)');
        $this->addSql('CREATE INDEX IDX_AC634F99BCF5E72D ON livre (categorie_id)');
        $this->addSql('CREATE INDEX IDX_AC634F993375BD21 ON livre (editeur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livre_auteur DROP FOREIGN KEY FK_A11876B537D925CB');
        $this->addSql('ALTER TABLE livre_auteur DROP FOREIGN KEY FK_A11876B560BB6FE6');
        $this->addSql('DROP TABLE livre_auteur');
        $this->addSql('ALTER TABLE auteur ADD biographie VARCHAR(50) NOT NULL, DROP email, CHANGE prenom prenom VARCHAR(50) DEFAULT NULL, CHANGE nom nom VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE categorie ADD description VARCHAR(50) NOT NULL, CHANGE designation designation VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE editeur ADD pays VARCHAR(50) DEFAULT NULL, ADD telephone INT NOT NULL, DROP num_tel, CHANGE nom_editeur nom_editeur VARCHAR(50) DEFAULT NULL, CHANGE adresse adresse VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F99BCF5E72D');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F993375BD21');
        $this->addSql('DROP INDEX IDX_AC634F99BCF5E72D ON livre');
        $this->addSql('DROP INDEX IDX_AC634F993375BD21 ON livre');
        $this->addSql('ALTER TABLE livre ADD date_edition DATE DEFAULT NULL, ADD nb_exemlpaires INT DEFAULT NULL, DROP editeur_id, DROP qte, CHANGE titre titre VARCHAR(50) DEFAULT NULL, CHANGE prix prix NUMERIC(10, 2) DEFAULT NULL, CHANGE isbn isbn BIGINT NOT NULL, CHANGE categorie_id nb_pages INT DEFAULT NULL');
    }
}
