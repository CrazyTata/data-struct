<?php
/**
 * Created by PhpStorm.
 * User: wangmg
 * Date: 2022/9/23
 * Time: 17:34
 */
//714. 买卖股票的最佳时机含手续费
//力扣题目链接(opens new window)
//
//给定一个整数数组 prices，其中第 i 个元素代表了第 i 天的股票价格 ；非负整数 fee 代表了交易股票的手续费用。
//
//你可以无限次地完成交易，但是你每笔交易都需要付手续费。如果你已经购买了一个股票，在卖出它之前你就不能再继续购买股票了。
//
//返回获得利润的最大值。
//
//注意：这里的一笔交易指买入持有并卖出股票的整个过程，每笔交易你只需要为支付一次手续费。
//
//示例 1: 输入: prices = [1, 3, 2, 8, 4, 9], fee = 2 输出: 8
//
//解释: 能够达到的最大利润: 在此处买入 prices[0] = 1 在此处卖出 prices[3] = 8 在此处买入 prices[4] = 4 在此处卖出 prices[5] = 9 总利润: ((8 - 1) - 2) + ((9 - 4) - 2) = 8.
//
//注意:
//
//0 < prices.length <= 50000.
//0 < prices[i] < 50000.
//0 <= fee < 50000.
//#思路
//本题相对于贪心算法：122.买卖股票的最佳时机II (opens new window)，多添加了一个条件就是手续费。
//
//#贪心算法
//在贪心算法：122.买卖股票的最佳时机II (opens new window)中使用贪心策略不用关心具体什么时候买卖，只要收集每天的正利润，最后稳稳的就是最大利润了。
//
//而本题有了手续费，就要关系什么时候买卖了，因为计算所获得利润，需要考虑买卖利润可能不足以手续费的情况。
//
//如果使用贪心策略，就是最低值买，最高值（如果算上手续费还盈利）就卖。
//
//此时无非就是要找到两个点，买入日期，和卖出日期。
//
//买入日期：其实很好想，遇到更低点就记录一下。
//卖出日期：这个就不好算了，但也没有必要算出准确的卖出日期，只要当前价格大于（最低价格+手续费），就可以收获利润，至于准确的卖出日期，就是连续收获利润区间里的最后一天（并不需要计算是具体哪一天）。
//所以我们在做收获利润操作的时候其实有三种情况：
//
//情况一：收获利润的这一天并不是收获利润区间里的最后一天（不是真正的卖出，相当于持有股票），所以后面要继续收获利润。
//情况二：前一天是收获利润区间里的最后一天（相当于真正的卖出了），今天要重新记录最小价格了。
//情况三：不作操作，保持原有状态（买入，卖出，不买不卖）
//贪心算法C++代码如下：
//
//class Solution {
//public:
//    int maxProfit(vector<int>& prices, int fee) {
//        int result = 0;
//        int minPrice = prices[0]; // 记录最低价格
//        for (int i = 1; i < prices.size(); i++) {
//            // 情况二：相当于买入
//            if (prices[i] < minPrice) minPrice = prices[i];
//
//            // 情况三：保持原有状态（因为此时买则不便宜，卖则亏本）
//            if (prices[i] >= minPrice && prices[i] <= minPrice + fee) {
//                continue;
//            }
//
//            // 计算利润，可能有多次计算利润，最后一次计算利润才是真正意义的卖出
//            if (prices[i] > minPrice + fee) {
//                result += prices[i] - minPrice - fee;
//                minPrice = prices[i] - fee; // 情况一，这一步很关键
//            }
//        }
//        return result;
//    }
//};
//时间复杂度：O(n)
//空间复杂度：O(1)
//从代码中可以看出对情况一的操作，因为如果还在收获利润的区间里，表示并不是真正的卖出，而计算利润每次都要减去手续费，所以要让minPrice = prices[i] - fee;，这样在明天收获利润的时候，才不会多减一次手续费！
//
//大家也可以发现，情况三，那块代码是可以删掉的，我是为了让代码表达清晰，所以没有精简。
//
//#动态规划
//我在公众号「代码随想录」里将在下一个系列详细讲解动态规划，所以本题解先给出我的C++代码（带详细注释），感兴趣的同学可以自己先学习一下。
//
//相对于贪心算法：122.买卖股票的最佳时机II (opens new window)的动态规划解法中，只需要在计算卖出操作的时候减去手续费就可以了，代码几乎是一样的。
//
//C++代码如下：
//
//class Solution {
//public:
//    int maxProfit(vector<int>& prices, int fee) {
//        // dp[i][1]第i天持有的最多现金
//        // dp[i][0]第i天持有股票所剩的最多现金
//        int n = prices.size();
//        vector<vector<int>> dp(n, vector<int>(2, 0));
//        dp[0][0] -= prices[0]; // 持股票
//        for (int i = 1; i < n; i++) {
//            dp[i][0] = max(dp[i - 1][0], dp[i - 1][1] - prices[i]);
//            dp[i][1] = max(dp[i - 1][1], dp[i - 1][0] + prices[i] - fee);
//        }
//        return max(dp[n - 1][0], dp[n - 1][1]);
//    }
//};
//时间复杂度：O(n)
//空间复杂度：O(n)
//当然可以对空间经行优化，因为当前状态只是依赖前一个状态。
//
//C++ 代码如下：
//
//class Solution {
//public:
//    int maxProfit(vector<int>& prices, int fee) {
//        int n = prices.size();
//        int holdStock = (-1) * prices[0]; // 持股票
//        int saleStock = 0; // 卖出股票
//        for (int i = 1; i < n; i++) {
//            int previousHoldStock = holdStock;
//            holdStock = max(holdStock, saleStock - prices[i]);
//            saleStock = max(saleStock, previousHoldStock + prices[i] - fee);
//        }
//        return saleStock;
//    }
//};
//时间复杂度：O(n)
//空间复杂度：O(1)
//#总结
//本题贪心的思路其实是比较难的，动态规划才是常规做法，但也算是给大家拓展一下思路，感受一下贪心的魅力。
//
//后期我们在讲解 股票问题系列的时候，会用动规的方式把股票问题穿个线。
//
//#其他语言版本