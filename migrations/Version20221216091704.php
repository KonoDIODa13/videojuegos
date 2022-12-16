<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221216091704 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE videojuego DROP FOREIGN KEY FK_AA5E6DFA899FB366');
        $this->addSql('DROP INDEX IDX_AA5E6DFA899FB366 ON videojuego');
        $this->addSql('ALTER TABLE videojuego DROP director_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE videojuego ADD director_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE videojuego ADD CONSTRAINT FK_AA5E6DFA899FB366 FOREIGN KEY (director_id) REFERENCES director (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_AA5E6DFA899FB366 ON videojuego (director_id)');
    }
}
