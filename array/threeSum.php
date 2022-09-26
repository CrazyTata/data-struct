<?php
//leetCode 15. 三数之和
/*
方法一：排序 + 双指针
题目中要求找到所有「不重复」且和为 00 的三元组，这个「不重复」的要求使得我们无法简单地使用三重循环枚举所有的三元组。这是因为在最坏的情况下，数组中的元素全部为 00，即

[0, 0, 0, 0, 0, ..., 0, 0, 0]
任意一个三元组的和都为 00。如果我们直接使用三重循环枚举三元组，会得到 O(N^3)个满足题目要求的三元组（其中 NN 是数组的长度）时间复杂度至少为 O(N^3)。
在这之后，我们还需要使用哈希表进行去重操作，得到不包含重复三元组的最终答案，又消耗了大量的空间。这个做法的时间复杂度和空间复杂度都很高，因此我们要换一种思路来考虑这个问题。

「不重复」的本质是什么？我们保持三重循环的大框架不变，只需要保证：

第二重循环枚举到的元素不小于当前第一重循环枚举到的元素；

第三重循环枚举到的元素不小于当前第二重循环枚举到的元素。

也就是说，我们枚举的三元组 (a, b, c)(a,b,c) 满足 a \leq b \leq ca≤b≤c，保证了只有 (a, b, c)(a,b,c) 这个顺序会被枚举到，而 (b, a, c)(b,a,c)、(c, b, a)(c,b,a) 等等这些不会，这样就减少了重复。要实现这一点，我们可以将数组中的元素从小到大进行排序，随后使用普通的三重循环就可以满足上面的要求。

同时，对于每一重循环而言，相邻两次枚举的元素不能相同，否则也会造成重复。举个例子，如果排完序的数组为

[0, 1, 2, 2, 2, 3]
 ^  ^  ^
我们使用三重循环枚举到的第一个三元组为 (0, 1, 2)(0,1,2)，如果第三重循环继续枚举下一个元素，那么仍然是三元组 (0, 1, 2)(0,1,2)，产生了重复。因此我们需要将第三重循环「跳到」下一个不相同的元素，即数组中的最后一个元素 33，枚举三元组 (0, 1, 3)(0,1,3)。

下面给出了改进的方法的伪代码实现：


nums.sort()
for first = 0 .. n-1
    // 只有和上一次枚举的元素不相同，我们才会进行枚举
    if first == 0 or nums[first] != nums[first-1] then
        for second = first+1 .. n-1
            if second == first+1 or nums[second] != nums[second-1] then
                for third = second+1 .. n-1
                    if third == second+1 or nums[third] != nums[third-1] then
                        // 判断是否有 a+b+c==0
                        check(first, second, third)
这种方法的时间复杂度仍然为 O(N^3)O(N
3
 )，毕竟我们还是没有跳出三重循环的大框架。然而它是很容易继续优化的，可以发现，如果我们固定了前两重循环枚举到的元素 aa 和 bb，那么只有唯一的 cc 满足 a+b+c=0a+b+c=0。当第二重循环往后枚举一个元素 b'b
′
  时，由于 b' > bb
′
 >b，那么满足 a+b'+c'=0a+b
′
 +c
′
 =0 的 c'c
′
  一定有 c' < cc
′
 <c，即 c'c
′
  在数组中一定出现在 cc 的左侧。也就是说，我们可以从小到大枚举 bb，同时从大到小枚举 cc，即第二重循环和第三重循环实际上是并列的关系。

有了这样的发现，我们就可以保持第二重循环不变，而将第三重循环变成一个从数组最右端开始向左移动的指针，从而得到下面的伪代码：

nums.sort()
for first = 0 .. n-1
    if first == 0 or nums[first] != nums[first-1] then
        // 第三重循环对应的指针
        third = n-1
        for second = first+1 .. n-1
            if second == first+1 or nums[second] != nums[second-1] then
                // 向左移动指针，直到 a+b+c 不大于 0
                while nums[first]+nums[second]+nums[third] > 0
                    third = third-1
                // 判断是否有 a+b+c==0
                check(first, second, third)
这个方法就是我们常说的「双指针」，当我们需要枚举数组中的两个元素时，如果我们发现随着第一个元素的递增，第二个元素是递减的，那么就可以使用双指针的方法，将枚举的时间复杂度从 O(N^2)
减少至 O(N)。为什么是 O(N)呢？这是因为在枚举的过程每一步中，「左指针」会向右移动一个位置（也就是题目中的 bb），而「右指针」会向左移动若干个位置，这个与数组的元素有关，
但我们知道它一共会移动的位置数为 O(N)，均摊下来，每次也向左移动一个位置，因此时间复杂度为 O(N)。

注意到我们的伪代码中还有第一重循环，时间复杂度为 O(N)，因此枚举的总时间复杂度为 O(N^2)。由于排序的时间复杂度为O(NlogN)，在渐进意义下小于前者，因此算法的总时间复杂度为 O(N^2)。

上述的伪代码中还有一些细节需要补充，例如我们需要保持左指针一直在右指针的左侧（即满足 b \leq cb≤c），具体可以参考下面的代码，均给出了详细的注释。
func threeSum(nums []int) [][]int {
    n := len(nums)
    sort.Ints(nums)
    ans := make([][]int, 0)

    // 枚举 a
    for first := 0; first < n; first++ {
        // 需要和上一次枚举的数不相同
        if first > 0 && nums[first] == nums[first - 1] {
            continue
        }
        // c 对应的指针初始指向数组的最右端
        third := n - 1
        target := -1 * nums[first]
        // 枚举 b
        for second := first + 1; second < n; second++ {
            // 需要和上一次枚举的数不相同
            if second > first + 1 && nums[second] == nums[second - 1] {
                continue
            }
            // 需要保证 b 的指针在 c 的指针的左侧
            for second < third && nums[second] + nums[third] > target {
                third--
            }
            // 如果指针重合，随着 b 后续的增加
            // 就不会有满足 a+b+c=0 并且 b<c 的 c 了，可以退出循环
            if second == third {
                break
            }
            if nums[second] + nums[third] == target {
                ans = append(ans, []int{nums[first], nums[second], nums[third]})
            }
        }
    }
    return ans
}

*/

//    /**
//     * @param Integer[] $nums
//     * @return Integer[][]
//     */
//    function threeSum($nums) {
//        $target = 0;
//        $res = [];
//        sort($nums);
//        for ($i = 0; $i < count($nums); $i++) {
//            if ($nums[$i] > $target) {
//                return $res;
//            }
//            if ($i > 0 && $nums[$i] == $nums[$i - 1]) {
//                continue;
//            }
//            $left = $i + 1;
//            $right = count($nums) - 1;
//            while ($left < $right) {
//                $sum = $nums[$i] + $nums[$left] + $nums[$right];
//                if ($sum < 0) {
//                    $left++;
//                }
//                else if ($sum > 0) {
//                    $right--;
//                }
//                else {
//                    $res[] = [$nums[$i], $nums[$left], $nums[$right]];
//                    while ($left < $right && $nums[$left] == $nums[$left + 1]) $left++;
//                    while ($left < $right && $nums[$right] == $nums[$right - 1]) $right--;
//                    $left++;
//                    $right--;
//                }
//            }
//        }
//        return $res;
//    }


//    function threeSum($nums){
//        $target = 0;
//        $length = count($nums);
//        if ($length<1) return [];
//        sort($nums);
//        $return = [];
//        for ($first=0;$first<$length;$first++){
//            if ($first>0&&$nums[$first]==$nums[$first-1]){
//                continue;
//            }
//            for ($second=$first+1;$second<$length;$second++){
//                if ($second>$first+1&&$nums[$second]==$nums[$second-1]){
//                    continue;
//                }
//                $third=$length-1;
//
//                while ($third>$second&&($nums[$second]+$nums[$first]+$nums[$third])>$target){
//                    $third --;
//                }
//                if ($second >= $third) {
//                    continue;
//                }
//                if(($nums[$second]+$nums[$first]+$nums[$third])==$target){
//                    $return[] = [$nums[$first],$nums[$second],$nums[$third]];
//                }
//            }
//        }
//        return $return;
//    }

function threeSum($nums){
    $target = 0;
    $length = count($nums);
    sort($nums);
    $return = [];
    for ($i=0;$i<$length;$i++){
        if ($i>0&&$nums[$i]==$nums[$i-1]) continue;
        $j=$i+1;
        $k = $length-1;
        while($j<$k){
            $sum = $nums[$i] + $nums[$j] + $nums[$k];
            if ($sum>$target){
                $k--;
            }else if ($sum<$target){
                $j++;
            }else{
                $return[] = [$nums[$i],$nums[$j],$nums[$k]];
                while ($j<$k&&$nums[$j]==$nums[$j+1]) $j++;
                while ($j<$k&&$nums[$k]==$nums[$k-1]) $k--;
                $j++;
                $k--;
            }
        }
    }
    return $return;
}

//双指针

$nums =  [-1,0,1,2,-1,-4];
//$nums =  [-4,-1,-1,0,1,2];
$target = 0;
var_dump(threeSum($nums));