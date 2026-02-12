<?php
// 2-MASALA: Union-Find (Disjoint Set)

class DSU {
    private $parent = [];
    private $rank = [];

    public function __construct($n) {
        for ($i = 0; $i < $n; $i++) {
            $this->parent[$i] = $i;
            $this->rank[$i] = 0;
        }
    }

    public function find($x) {
        if ($this->parent[$x] != $x) {
            $this->parent[$x] = $this->find($this->parent[$x]);
        }
        return $this->parent[$x];
    }

    public function union($a, $b) {
        $ra = $this->find($a);
        $rb = $this->find($b);
        if ($ra != $rb) {
            if ($this->rank[$ra] < $this->rank[$rb]) {
                $this->parent[$ra] = $rb;
            } elseif ($this->rank[$ra] > $this->rank[$rb]) {
                $this->parent[$rb] = $ra;
            } else {
                $this->parent[$rb] = $ra;
                $this->rank[$ra]++;
            }
        }
    }
}

$dsu = new DSU(5);
$dsu->union(0, 1);
$dsu->union(1, 2);
echo $dsu->find(2);
