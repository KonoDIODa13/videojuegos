<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221118095404 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lista_juegos DROP FOREIGN KEY FK_F6AD149B7EB2C349');
        $this->addSql('DROP INDEX IDX_F6AD149B7EB2C349 ON lista_juegos');
        $this->addSql('ALTER TABLE lista_juegos CHANGE id_usuario_id usuario_id INT NOT NULL');
        $this->addSql('ALTER TABLE lista_juegos ADD CONSTRAINT FK_F6AD149BDB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('CREATE INDEX IDX_F6AD149BDB38439E ON lista_juegos (usuario_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lista_juegos DROP FOREIGN KEY FK_F6AD149BDB38439E');
        $this->addSql('DROP INDEX IDX_F6AD149BDB38439E ON lista_juegos');
        $this->addSql('ALTER TABLE lista_juegos CHANGE usuario_id id_usuario_id INT NOT NULL');
        $this->addSql('ALTER TABLE lista_juegos ADD CONSTRAINT FK_F6AD149B7EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES usuario (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_F6AD149B7EB2C349 ON lista_juegos (id_usuario_id)');
    }
}
