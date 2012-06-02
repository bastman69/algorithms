<?php

abstract class AlgorithmMCF extends Algorithm {

    /**
     * Origianl graph
     * 
     * @var Graph
     */
    protected $graph;
    
    /**
     * The given graph where the algorithm should operate on
     * 
     * @param Graph $graph
     * @throws Exception if the given graph is not balanced
     */
    public function __construct(Graph $graph){
        $this->graph = $graph;
    }
    
    /**
     * check if balance is okay and throw exception otherwise
     * 
     * @throws Exception
     * @return AlgorithmMCF $this (chainable)
     */
    protected function checkBalance(){
        $balance = $this->graph->getBalance();
        $tolerance = 0.000001;
        if($balance >= $tolerance || $balance <= -$tolerance){
            throw new Exception("The given graph is not balanced value is: ".$balance);
        }
        return $this;
    }
    
    /**
     * create new resulting graph with minimum-cost flow on edges
     *
     * @throws Exception if the graph has not enough capacity for the minimum-cost flow
     * @return Graph
     */
    abstract public function createGraph();
}
