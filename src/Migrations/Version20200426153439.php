<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200426153439 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE favorito (id INT AUTO_INCREMENT NOT NULL, id_sitio VARCHAR(255) NOT NULL, nombre VARCHAR(255) NOT NULL, latitud VARCHAR(255) NOT NULL, longitud VARCHAR(255) NOT NULL, icono VARCHAR(255) NOT NULL, direccion VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_881067C7EA31F810 (id_sitio), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuario (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_2265B05DE7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuario_favorito (usuario_id INT NOT NULL, favorito_id INT NOT NULL, INDEX IDX_60D1955EDB38439E (usuario_id), INDEX IDX_60D1955EC5AAA879 (favorito_id), PRIMARY KEY(usuario_id, favorito_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE usuario_favorito ADD CONSTRAINT FK_60D1955EDB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE usuario_favorito ADD CONSTRAINT FK_60D1955EC5AAA879 FOREIGN KEY (favorito_id) REFERENCES favorito (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE usuario_favorito DROP FOREIGN KEY FK_60D1955EC5AAA879');
        $this->addSql('ALTER TABLE usuario_favorito DROP FOREIGN KEY FK_60D1955EDB38439E');
        $this->addSql('DROP TABLE favorito');
        $this->addSql('DROP TABLE usuario');
        $this->addSql('DROP TABLE usuario_favorito');
    }
}
