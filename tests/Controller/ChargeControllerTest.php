<?php

namespace App\Test\Controller;

use App\Entity\Charge;
use App\Repository\ChargeRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ChargeControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private ChargeRepository $repository;
    private string $path = '/charge/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Charge::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Charge index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'charge[amount]' => 'Testing',
            'charge[currency]' => 'Testing',
            'charge[description]' => 'Testing',
            'charge[recipientEmail]' => 'Testing',
            'charge[addressLine1]' => 'Testing',
            'charge[addressPostalCode]' => 'Testing',
            'charge[refunded]' => 'Testing',
            'charge[notes]' => 'Testing',
            'charge[created]' => 'Testing',
            'charge[updated]' => 'Testing',
        ]);

        self::assertResponseRedirects('/charge/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Charge();
        $fixture->setAmount('My Title');
        $fixture->setCurrency('My Title');
        $fixture->setDescription('My Title');
        $fixture->setRecipientEmail('My Title');
        $fixture->setAddressLine1('My Title');
        $fixture->setAddressPostalCode('My Title');
        $fixture->setRefunded('My Title');
        $fixture->setNotes('My Title');
        $fixture->setCreated('My Title');
        $fixture->setUpdated('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Charge');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Charge();
        $fixture->setAmount('My Title');
        $fixture->setCurrency('My Title');
        $fixture->setDescription('My Title');
        $fixture->setRecipientEmail('My Title');
        $fixture->setAddressLine1('My Title');
        $fixture->setAddressPostalCode('My Title');
        $fixture->setRefunded('My Title');
        $fixture->setNotes('My Title');
        $fixture->setCreated('My Title');
        $fixture->setUpdated('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'charge[amount]' => 'Something New',
            'charge[currency]' => 'Something New',
            'charge[description]' => 'Something New',
            'charge[recipientEmail]' => 'Something New',
            'charge[addressLine1]' => 'Something New',
            'charge[addressPostalCode]' => 'Something New',
            'charge[refunded]' => 'Something New',
            'charge[notes]' => 'Something New',
            'charge[created]' => 'Something New',
            'charge[updated]' => 'Something New',
        ]);

        self::assertResponseRedirects('/charge/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getAmount());
        self::assertSame('Something New', $fixture[0]->getCurrency());
        self::assertSame('Something New', $fixture[0]->getDescription());
        self::assertSame('Something New', $fixture[0]->getRecipientEmail());
        self::assertSame('Something New', $fixture[0]->getAddressLine1());
        self::assertSame('Something New', $fixture[0]->getAddressPostalCode());
        self::assertSame('Something New', $fixture[0]->getRefunded());
        self::assertSame('Something New', $fixture[0]->getNotes());
        self::assertSame('Something New', $fixture[0]->getCreated());
        self::assertSame('Something New', $fixture[0]->getUpdated());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Charge();
        $fixture->setAmount('My Title');
        $fixture->setCurrency('My Title');
        $fixture->setDescription('My Title');
        $fixture->setRecipientEmail('My Title');
        $fixture->setAddressLine1('My Title');
        $fixture->setAddressPostalCode('My Title');
        $fixture->setRefunded('My Title');
        $fixture->setNotes('My Title');
        $fixture->setCreated('My Title');
        $fixture->setUpdated('My Title');

        $this->repository->save($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/charge/');
    }
}
