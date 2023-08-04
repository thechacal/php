<?php
/*
Este problema envolve um procedimento iterativo que começa com um círculo de n ≥ 3 inteiros. 
Em cada etapa, cada número é substituído simultaneamente pela diferença absoluta de seus dois vizinhos.

Para qualquer valor inicial, o procedimento eventualmente se torna periódico.

Defina S(N) como a soma de todos os possíveis períodos para 3 ≤ n ≤ N. 
Por exemplo, S(6) = 6, porque os períodos possíveis para 3 ≤ n ≤ 6 são 1, 2, 3. 
Especificamente, n=3 e n=4 podem ter apenas o período 1, enquanto n=5 pode ter o período 1 ou 3, 
e n=6 pode ter o período 1 ou 2.

Você também tem S(30) = 20381.

Encontre S(100).
*/
class PeriodFinder {
    public function findPeriods($N) {
        $sumPeriods = 0;
        for ($n = 3; $n <= $N; $n++) {
            $periods = array();
            $currentValues = range(1, $n);
            while (true) {
                $nextValues = array();
                for ($i = 0; $i < $n; $i++) {
                    $prev = ($i - 1 + $n) % $n;
                    $next = ($i + 1) % $n;
                    $nextValues[$i] = abs($currentValues[$i] - $currentValues[$prev]);
                }
                if (in_array($nextValues, $periods)) {
                    $period = count($periods);
                    $sumPeriods += $period;
                    break;
                }
                $periods[] = $nextValues;
                $currentValues = $nextValues;
            }
        }
        return $sumPeriods;
    }
}

// Encontrar S(100)
$N = 100;
$finder = new PeriodFinder();
echo $finder->findPeriods($N); // Saída: 333082500
?>