<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221216090515 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE director DROP FOREIGN KEY FK_1E90D3F082925A85');
        $this->addSql('DROP INDEX IDX_1E90D3F082925A85 ON director');
        $this->addSql('ALTER TABLE director DROP videojuego_id');
        $this->addSql('ALTER TABLE empresa_desarrolladora DROP FOREIGN KEY FK_F616848482925A85');
        $this->addSql('DROP INDEX IDX_F616848482925A85 ON empresa_desarrolladora');
        $this->addSql('ALTER TABLE empresa_desarrolladora DROP videojuego_id');
        $this->addSql('ALTER TABLE genero DROP FOREIGN KEY FK_A000883A82925A85');
        $this->addSql('DROP INDEX IDX_A000883A82925A85 ON genero');
        $this->addSql('ALTER TABLE genero DROP videojuego_id');
        $this->addSql('ALTER TABLE videojuego ADD director_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE videojuego ADD CONSTRAINT FK_AA5E6DFA899FB366 FOREIGN KEY (director_id) REFERENCES director (id)');
        $this->addSql('CREATE INDEX IDX_AA5E6DFA899FB366 ON videojuego (director_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE director ADD videojuego_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE director ADD CONSTRAINT FK_1E90D3F082925A85 FOREIGN KEY (videojuego_id) REFERENCES videojuego (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_1E90D3F082925A85 ON director (videojuego_id)');
        $this->addSql('ALTER TABLE videojuego DROP FOREIGN KEY FK_AA5E6DFA899FB366');
        $this->addSql('DROP INDEX IDX_AA5E6DFA899FB366 ON videojuego');
        $this->addSql('ALTER TABLE videojuego DROP director_id');
        $this->addSql('ALTER TABLE empresa_desarrolladora ADD videojuego_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE empresa_desarrolladora ADD CONSTRAINT FK_F616848482925A85 FOREIGN KEY (videojuego_id) REFERENCES videojuego (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_F616848482925A85 ON empresa_desarrolladora (videojuego_id)');
        $this->addSql('ALTER TABLE genero ADD videojuego_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE genero ADD CONSTRAINT FK_A000883A82925A85 FOREIGN KEY (videojuego_id) REFERENCES videojuego (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_A000883A82925A85 ON genero (videojuego_id)');
    }
}
