<?php

/**
 * LeetCode 53: Maximum Subarray
 * URL: https://leetcode.com/problems/maximum-subarray/
 *
 * Approach:
 * Kadane's algorithm is used to find the maximum subarray sum.
 * Initialize two variables: $currentSum and $maxSum to the first element of the array.
 * Loop through the array starting from the second element:
 * - Update $currentSum to be the maximum of the current element and the sum of $currentSum and the current element.
 * - Update $maxSum to be the maximum of $maxSum and $currentSum.
 * Return $maxSum as the result.
 *
 * Time Complexity: O(n)
 * Space Complexity: O(1)
 *
 * Example:
 * $nums = [-2,1,-3,4,-1,2,1,-5,4];
 * echo maxSubArray($nums); // Output: 6
 */

class Solution {
    function maxSubArray($nums) {
        $currentSum = $nums[0];
        $maxSum = $nums[0];

        for ($i = 1; $i < count($nums); $i++) {
            $currentSum = max($nums[$i], $currentSum + $nums[$i]);
            $maxSum = max($maxSum, $currentSum);
        }

        return $maxSum;
    }
}

// Test case
$nums = [-2, 1, -3, 4, -1, 2, 1, -5, 4];
$solution = new Solution();
echo $solution->maxSubArray($nums); // Output: 6
?>
