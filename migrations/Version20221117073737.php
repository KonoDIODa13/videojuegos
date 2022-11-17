<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221117073737 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE videojuego ADD lista_juegos_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE videojuego ADD CONSTRAINT FK_AA5E6DFA11CE9AD7 FOREIGN KEY (lista_juegos_id) REFERENCES usuario (id)');
        $this->addSql('CREATE INDEX IDX_AA5E6DFA11CE9AD7 ON videojuego (lista_juegos_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE videojuego DROP FOREIGN KEY FK_AA5E6DFA11CE9AD7');
        $this->addSql('DROP INDEX IDX_AA5E6DFA11CE9AD7 ON videojuego');
        $this->addSql('ALTER TABLE videojuego DROP lista_juegos_id');
    }
}
