<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221124084421 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE videojuego CHANGE autor autor LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', CHANGE tema tema LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', CHANGE fecha_publicacion fecha_publicacion VARCHAR(4) DEFAULT NULL, CHANGE desarrollador desarrollador LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_AA5E6DFA989D9B62 ON videojuego (slug)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_AA5E6DFA989D9B62 ON videojuego');
        $this->addSql('ALTER TABLE videojuego CHANGE autor autor LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', CHANGE tema tema LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', CHANGE fecha_publicacion fecha_publicacion VARCHAR(4) NOT NULL, CHANGE desarrollador desarrollador LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\'');
    }
}
