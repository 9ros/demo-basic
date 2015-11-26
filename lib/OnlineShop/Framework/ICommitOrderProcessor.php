<?php
/**
 * Pimcore
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) 2009-2015 pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GNU General Public License version 3 (GPLv3)
 */


/**
 * Interface OnlineShop_Framework_ICommitOrderProcessor
 */
interface OnlineShop_Framework_ICommitOrderProcessor {

    /**
     * facade method for
     * - handling payment response and
     * - commit order payment
     *
     * can be used by controllers to commit orders with payment
     *
     * @param $paymentResponseParams
     * @param OnlineShop_Framework_IPayment $paymentProvider
     * @return OnlineShop_Framework_AbstractOrder
     */
    public function handlePaymentResponseAndCommitOrderPayment($paymentResponseParams, OnlineShop_Framework_IPayment $paymentProvider);

    /**
     * commits order payment
     *   - updates order payment information in order object
     *   - only when payment status == [ORDER_STATE_COMMITTED, ORDER_STATE_PAYMENT_AUTHORIZED] -> order is committed
     *
     * use this for committing order when payment is activated
     *
     * @param OnlineShop_Framework_Payment_IStatus $paymentStatus
     * @param OnlineShop_Framework_IPayment $paymentProvider
     * @return OnlineShop_Framework_AbstractOrder
     */
    public function commitOrderPayment(OnlineShop_Framework_Payment_IStatus $paymentStatus, OnlineShop_Framework_IPayment $paymentProvider);

    /**
     * commits order
     *
     * @param OnlineShop_Framework_AbstractOrder $order
     * @return OnlineShop_Framework_AbstractOrder
     */
    public function commitOrder(OnlineShop_Framework_AbstractOrder $order);

    /**
     * @param string $confirmationMail
     */
    public function setConfirmationMail($confirmationMail);


    /**
     * cleans up orders with state pending payment after 1h
     *
     * @return void
     */
    public function cleanUpPendingOrders();
}
