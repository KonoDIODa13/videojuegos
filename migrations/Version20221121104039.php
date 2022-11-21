<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221121104039 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE listaJuegos DROP FOREIGN KEY FK_596E275882925A85');
        $this->addSql('ALTER TABLE listaJuegos DROP FOREIGN KEY FK_596E2758DB38439E');
        $this->addSql('DROP TABLE listaJuegos');
        $this->addSql('DROP TABLE lista_juegos');
        $this->addSql('DROP TABLE usuario_videojuego');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE listaJuegos (usuario_id INT NOT NULL, videojuego_id INT NOT NULL, INDEX IDX_596E2758DB38439E (usuario_id), INDEX IDX_596E275882925A85 (videojuego_id), PRIMARY KEY(usuario_id, videojuego_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE lista_juegos (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE usuario_videojuego (usuario_id INT NOT NULL, videojuego_id INT NOT NULL, INDEX IDX_596E2758DB38439E (usuario_id), INDEX IDX_596E275882925A85 (videojuego_id), PRIMARY KEY(usuario_id, videojuego_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE listaJuegos ADD CONSTRAINT FK_596E275882925A85 FOREIGN KEY (videojuego_id) REFERENCES videojuego (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE listaJuegos ADD CONSTRAINT FK_596E2758DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id) ON UPDATE NO ACTION ON DELETE CASCADE');
    }
}
