# quatro

linear graph



class MyStore implements MemMemov\Quatro\StoreInterface
{
}

$myStore = new MyStore();

$quatro = new MemMemov\Quatro\Quatro($myStore);

**Create new nodes**

$n1 = $quatro->create();
$n2 = $quatro->create();
$n3 = $quatro->create();

**Connect nodes**

$n1->add($n2);
$n1->add($n3);

**Iterate over child nodes**

$n1->each(function($node) {

});

**Find a node by its ID**

$n3 = $quatro->read(3);
