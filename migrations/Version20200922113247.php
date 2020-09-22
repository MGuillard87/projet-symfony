<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200922113247 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE quack ADD duck_id INT NOT NULL');
        $this->addSql('ALTER TABLE quack ADD CONSTRAINT FK_83D44F6F12CF4A47 FOREIGN KEY (duck_id) REFERENCES duck (id)');
        $this->addSql('CREATE INDEX IDX_83D44F6F12CF4A47 ON quack (duck_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE quack DROP FOREIGN KEY FK_83D44F6F12CF4A47');
        $this->addSql('DROP INDEX IDX_83D44F6F12CF4A47 ON quack');
        $this->addSql('ALTER TABLE quack DROP duck_id');
    }
}
