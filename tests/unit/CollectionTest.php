<?php

use App\Support\Collection;
use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase {


    /** @test */
    public function empty_instantiated_collection_return_no_items()
    {
        $collection = new Collection();

        $this->assertEmpty($collection->get());
    }

    /** @test */
    public function count_is_correct_for_items_in()
    {
        $collection = new Collection([
            'one' , 'two' , 'three'
        ]);

        $this->assertEquals($collection->count(),3);
    }

    /** @test */
    public function items_returned_match_items_passed_in()
    {
        $collection = new Collection([
            'one' , 'two'
        ]);

        $this->assertEquals($collection->get()[0],'one');
        $this->assertEquals($collection->get()[1],'two');
    }

    /** @test */
    public function collection_is_instance_of_iterator_aggregate()
    {
        $collection = new Collection();

        $this->assertInstanceOf(IteratorAggregate::class,$collection);
    }

    /** @test */
    public function collection_can_be_iterated(){
        $collection = new Collection([
            'one' , 'two'
        ]);

        $items = [];

        foreach($collection as $item){
            $items[] = $item; 
        }

        $this->assertCount(2,$items);
    }

    /** @test */
    public function add_new_items_to_exists_collection()
    {
        $collection = new Collection(['one','two']);

        $collection->add(['three']);

        $this->assertEquals($collection->count(),3);
        $this->assertCount(3,$collection->get());
    }

    /** @test */
    public function collection_can_be_merged_with_another_collection()
    {
        $collection1 = new Collection(['one','two']);
        $collection2 = new Collection(['three','four','five']);

        $collection1->merge($collection2);

        $this->assertEquals($collection1->count(),5);
        $this->assertCount(5,$collection1->get());
    }

    /** @test */
    public function return_json_encoded_items()
    {
        $collection = new Collection([
            ['username' => 'mustafa'],
            ['username' => 'mohammed']
        ]);

        $this->assertIsString($collection->toJson());
        $this->assertEquals($collection->toJson(),'[{"username":"mustafa"},{"username":"mohammed"}]');
    }

    /** @test */
    public function json_encoding_a_collection_object_return_json()
    {
        $collection = new Collection([
            ['username' => 'mustafa'],
            ['username' => 'mohammed']
        ]);

        $encoded = json_encode($collection);

        $this->assertIsString($encoded);
        $this->assertEquals($encoded,'[{"username":"mustafa"},{"username":"mohammed"}]');
    }
}