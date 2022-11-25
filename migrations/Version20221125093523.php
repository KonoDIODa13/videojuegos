<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221125093523 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE videojuego CHANGE director director LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', CHANGE genero genero LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', CHANGE fecha_publicacion fecha_publicacion VARCHAR(4) DEFAULT NULL, CHANGE desarrollador desarrollador LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_AA5E6DFA989D9B62 ON videojuego (slug)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_AA5E6DFA989D9B62 ON videojuego');
        $this->addSql('ALTER TABLE videojuego CHANGE director director LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', CHANGE genero genero LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', CHANGE fecha_publicacion fecha_publicacion VARCHAR(4) NOT NULL, CHANGE desarrollador desarrollador LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\'');
    }
}
