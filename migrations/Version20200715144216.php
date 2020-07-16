<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200715144216 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE application ADD candidate_id INT NOT NULL, ADD joboffer_id INT NOT NULL');
        $this->addSql('ALTER TABLE application ADD CONSTRAINT FK_A45BDDC191BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id)');
        $this->addSql('ALTER TABLE application ADD CONSTRAINT FK_A45BDDC1BD612208 FOREIGN KEY (joboffer_id) REFERENCES joboffer (id)');
        $this->addSql('CREATE INDEX IDX_A45BDDC191BD8781 ON application (candidate_id)');
        $this->addSql('CREATE INDEX IDX_A45BDDC1BD612208 ON application (joboffer_id)');
        $this->addSql('ALTER TABLE candidate ADD sector_id INT NOT NULL');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E44DE95C867 FOREIGN KEY (sector_id) REFERENCES sector (id)');
        $this->addSql('CREATE INDEX IDX_C8B28E44DE95C867 ON candidate (sector_id)');
        $this->addSql('ALTER TABLE joboffer ADD client_id INT NOT NULL, ADD sector_id INT NOT NULL');
        $this->addSql('ALTER TABLE joboffer ADD CONSTRAINT FK_F33F816419EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE joboffer ADD CONSTRAINT FK_F33F8164DE95C867 FOREIGN KEY (sector_id) REFERENCES sector (id)');
        $this->addSql('CREATE INDEX IDX_F33F816419EB6921 ON joboffer (client_id)');
        $this->addSql('CREATE INDEX IDX_F33F8164DE95C867 ON joboffer (sector_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE application DROP FOREIGN KEY FK_A45BDDC191BD8781');
        $this->addSql('ALTER TABLE application DROP FOREIGN KEY FK_A45BDDC1BD612208');
        $this->addSql('DROP INDEX IDX_A45BDDC191BD8781 ON application');
        $this->addSql('DROP INDEX IDX_A45BDDC1BD612208 ON application');
        $this->addSql('ALTER TABLE application DROP candidate_id, DROP joboffer_id');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E44DE95C867');
        $this->addSql('DROP INDEX IDX_C8B28E44DE95C867 ON candidate');
        $this->addSql('ALTER TABLE candidate DROP sector_id');
        $this->addSql('ALTER TABLE joboffer DROP FOREIGN KEY FK_F33F816419EB6921');
        $this->addSql('ALTER TABLE joboffer DROP FOREIGN KEY FK_F33F8164DE95C867');
        $this->addSql('DROP INDEX IDX_F33F816419EB6921 ON joboffer');
        $this->addSql('DROP INDEX IDX_F33F8164DE95C867 ON joboffer');
        $this->addSql('ALTER TABLE joboffer DROP client_id, DROP sector_id');
    }
}
