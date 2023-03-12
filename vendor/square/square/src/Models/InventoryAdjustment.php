<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Represents a change in state or quantity of product inventory at a
 * particular time and location.
 */
class InventoryAdjustment implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $referenceId;

    /**
     * @var string|null
     */
    private $fromState;

    /**
     * @var string|null
     */
    private $toState;

    /**
     * @var string|null
     */
    private $locationId;

    /**
     * @var string|null
     */
    private $catalogObjectId;

    /**
     * @var string|null
     */
    private $catalogObjectType;

    /**
     * @var string|null
     */
    private $quantity;

    /**
     * @var Money|null
     */
    private $totalPriceMoney;

    /**
     * @var string|null
     */
    private $occurredAt;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var SourceApplication|null
     */
    private $source;

    /**
     * @var string|null
     */
    private $employeeId;

    /**
     * @var string|null
     */
    private $transactionId;

    /**
     * @var string|null
     */
    private $refundId;

    /**
     * @var string|null
     */
    private $purchaseOrderId;

    /**
     * @var string|null
     */
    private $goodsReceiptId;

    /**
     * @var InventoryAdjustmentGroup|null
     */
    private $adjustmentGroup;

    /**
     * Returns Id.
     *
     * A unique ID generated by Square for the
     * `InventoryAdjustment`.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * A unique ID generated by Square for the
     * `InventoryAdjustment`.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Reference Id.
     *
     * An optional ID provided by the application to tie the
     * `InventoryAdjustment` to an external
     * system.
     */
    public function getReferenceId(): ?string
    {
        return $this->referenceId;
    }

    /**
     * Sets Reference Id.
     *
     * An optional ID provided by the application to tie the
     * `InventoryAdjustment` to an external
     * system.
     *
     * @maps reference_id
     */
    public function setReferenceId(?string $referenceId): void
    {
        $this->referenceId = $referenceId;
    }

    /**
     * Returns From State.
     *
     * Indicates the state of a tracked item quantity in the lifecycle of goods.
     */
    public function getFromState(): ?string
    {
        return $this->fromState;
    }

    /**
     * Sets From State.
     *
     * Indicates the state of a tracked item quantity in the lifecycle of goods.
     *
     * @maps from_state
     */
    public function setFromState(?string $fromState): void
    {
        $this->fromState = $fromState;
    }

    /**
     * Returns To State.
     *
     * Indicates the state of a tracked item quantity in the lifecycle of goods.
     */
    public function getToState(): ?string
    {
        return $this->toState;
    }

    /**
     * Sets To State.
     *
     * Indicates the state of a tracked item quantity in the lifecycle of goods.
     *
     * @maps to_state
     */
    public function setToState(?string $toState): void
    {
        $this->toState = $toState;
    }

    /**
     * Returns Location Id.
     *
     * The Square-generated ID of the [Location]($m/Location) where the related
     * quantity of items is being tracked.
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The Square-generated ID of the [Location]($m/Location) where the related
     * quantity of items is being tracked.
     *
     * @maps location_id
     */
    public function setLocationId(?string $locationId): void
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Catalog Object Id.
     *
     * The Square-generated ID of the
     * [CatalogObject]($m/CatalogObject) being tracked.
     */
    public function getCatalogObjectId(): ?string
    {
        return $this->catalogObjectId;
    }

    /**
     * Sets Catalog Object Id.
     *
     * The Square-generated ID of the
     * [CatalogObject]($m/CatalogObject) being tracked.
     *
     * @maps catalog_object_id
     */
    public function setCatalogObjectId(?string $catalogObjectId): void
    {
        $this->catalogObjectId = $catalogObjectId;
    }

    /**
     * Returns Catalog Object Type.
     *
     * The [type]($m/CatalogObjectType) of the
     * [CatalogObject]($m/CatalogObject) being tracked. Tracking is only
     * supported for the `ITEM_VARIATION` type.
     */
    public function getCatalogObjectType(): ?string
    {
        return $this->catalogObjectType;
    }

    /**
     * Sets Catalog Object Type.
     *
     * The [type]($m/CatalogObjectType) of the
     * [CatalogObject]($m/CatalogObject) being tracked. Tracking is only
     * supported for the `ITEM_VARIATION` type.
     *
     * @maps catalog_object_type
     */
    public function setCatalogObjectType(?string $catalogObjectType): void
    {
        $this->catalogObjectType = $catalogObjectType;
    }

    /**
     * Returns Quantity.
     *
     * The number of items affected by the adjustment as a decimal string.
     * Can support up to 5 digits after the decimal point.
     */
    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

    /**
     * Sets Quantity.
     *
     * The number of items affected by the adjustment as a decimal string.
     * Can support up to 5 digits after the decimal point.
     *
     * @maps quantity
     */
    public function setQuantity(?string $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * Returns Total Price Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getTotalPriceMoney(): ?Money
    {
        return $this->totalPriceMoney;
    }

    /**
     * Sets Total Price Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps total_price_money
     */
    public function setTotalPriceMoney(?Money $totalPriceMoney): void
    {
        $this->totalPriceMoney = $totalPriceMoney;
    }

    /**
     * Returns Occurred At.
     *
     * A client-generated RFC 3339-formatted timestamp that indicates when
     * the inventory adjustment took place. For inventory adjustment updates, the `occurred_at`
     * timestamp cannot be older than 24 hours or in the future relative to the
     * time of the request.
     */
    public function getOccurredAt(): ?string
    {
        return $this->occurredAt;
    }

    /**
     * Sets Occurred At.
     *
     * A client-generated RFC 3339-formatted timestamp that indicates when
     * the inventory adjustment took place. For inventory adjustment updates, the `occurred_at`
     * timestamp cannot be older than 24 hours or in the future relative to the
     * time of the request.
     *
     * @maps occurred_at
     */
    public function setOccurredAt(?string $occurredAt): void
    {
        $this->occurredAt = $occurredAt;
    }

    /**
     * Returns Created At.
     *
     * An RFC 3339-formatted timestamp that indicates when the inventory adjustment is received.
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * An RFC 3339-formatted timestamp that indicates when the inventory adjustment is received.
     *
     * @maps created_at
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Source.
     *
     * Provides information about the application used to generate a change.
     */
    public function getSource(): ?SourceApplication
    {
        return $this->source;
    }

    /**
     * Sets Source.
     *
     * Provides information about the application used to generate a change.
     *
     * @maps source
     */
    public function setSource(?SourceApplication $source): void
    {
        $this->source = $source;
    }

    /**
     * Returns Employee Id.
     *
     * The Square-generated ID of the [Employee]($m/Employee) responsible for the
     * inventory adjustment.
     */
    public function getEmployeeId(): ?string
    {
        return $this->employeeId;
    }

    /**
     * Sets Employee Id.
     *
     * The Square-generated ID of the [Employee]($m/Employee) responsible for the
     * inventory adjustment.
     *
     * @maps employee_id
     */
    public function setEmployeeId(?string $employeeId): void
    {
        $this->employeeId = $employeeId;
    }

    /**
     * Returns Transaction Id.
     *
     * The Square-generated ID of the [Transaction][#type-transaction] that
     * caused the adjustment. Only relevant for payment-related state
     * transitions.
     */
    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }

    /**
     * Sets Transaction Id.
     *
     * The Square-generated ID of the [Transaction][#type-transaction] that
     * caused the adjustment. Only relevant for payment-related state
     * transitions.
     *
     * @maps transaction_id
     */
    public function setTransactionId(?string $transactionId): void
    {
        $this->transactionId = $transactionId;
    }

    /**
     * Returns Refund Id.
     *
     * The Square-generated ID of the [Refund][#type-refund] that
     * caused the adjustment. Only relevant for refund-related state
     * transitions.
     */
    public function getRefundId(): ?string
    {
        return $this->refundId;
    }

    /**
     * Sets Refund Id.
     *
     * The Square-generated ID of the [Refund][#type-refund] that
     * caused the adjustment. Only relevant for refund-related state
     * transitions.
     *
     * @maps refund_id
     */
    public function setRefundId(?string $refundId): void
    {
        $this->refundId = $refundId;
    }

    /**
     * Returns Purchase Order Id.
     *
     * The Square-generated ID of the purchase order that caused the
     * adjustment. Only relevant for state transitions from the Square for Retail
     * app.
     */
    public function getPurchaseOrderId(): ?string
    {
        return $this->purchaseOrderId;
    }

    /**
     * Sets Purchase Order Id.
     *
     * The Square-generated ID of the purchase order that caused the
     * adjustment. Only relevant for state transitions from the Square for Retail
     * app.
     *
     * @maps purchase_order_id
     */
    public function setPurchaseOrderId(?string $purchaseOrderId): void
    {
        $this->purchaseOrderId = $purchaseOrderId;
    }

    /**
     * Returns Goods Receipt Id.
     *
     * The Square-generated ID of the goods receipt that caused the
     * adjustment. Only relevant for state transitions from the Square for Retail
     * app.
     */
    public function getGoodsReceiptId(): ?string
    {
        return $this->goodsReceiptId;
    }

    /**
     * Sets Goods Receipt Id.
     *
     * The Square-generated ID of the goods receipt that caused the
     * adjustment. Only relevant for state transitions from the Square for Retail
     * app.
     *
     * @maps goods_receipt_id
     */
    public function setGoodsReceiptId(?string $goodsReceiptId): void
    {
        $this->goodsReceiptId = $goodsReceiptId;
    }

    /**
     * Returns Adjustment Group.
     */
    public function getAdjustmentGroup(): ?InventoryAdjustmentGroup
    {
        return $this->adjustmentGroup;
    }

    /**
     * Sets Adjustment Group.
     *
     * @maps adjustment_group
     */
    public function setAdjustmentGroup(?InventoryAdjustmentGroup $adjustmentGroup): void
    {
        $this->adjustmentGroup = $adjustmentGroup;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->id)) {
            $json['id']                  = $this->id;
        }
        if (isset($this->referenceId)) {
            $json['reference_id']        = $this->referenceId;
        }
        if (isset($this->fromState)) {
            $json['from_state']          = $this->fromState;
        }
        if (isset($this->toState)) {
            $json['to_state']            = $this->toState;
        }
        if (isset($this->locationId)) {
            $json['location_id']         = $this->locationId;
        }
        if (isset($this->catalogObjectId)) {
            $json['catalog_object_id']   = $this->catalogObjectId;
        }
        if (isset($this->catalogObjectType)) {
            $json['catalog_object_type'] = $this->catalogObjectType;
        }
        if (isset($this->quantity)) {
            $json['quantity']            = $this->quantity;
        }
        if (isset($this->totalPriceMoney)) {
            $json['total_price_money']   = $this->totalPriceMoney;
        }
        if (isset($this->occurredAt)) {
            $json['occurred_at']         = $this->occurredAt;
        }
        if (isset($this->createdAt)) {
            $json['created_at']          = $this->createdAt;
        }
        if (isset($this->source)) {
            $json['source']              = $this->source;
        }
        if (isset($this->employeeId)) {
            $json['employee_id']         = $this->employeeId;
        }
        if (isset($this->transactionId)) {
            $json['transaction_id']      = $this->transactionId;
        }
        if (isset($this->refundId)) {
            $json['refund_id']           = $this->refundId;
        }
        if (isset($this->purchaseOrderId)) {
            $json['purchase_order_id']   = $this->purchaseOrderId;
        }
        if (isset($this->goodsReceiptId)) {
            $json['goods_receipt_id']    = $this->goodsReceiptId;
        }
        if (isset($this->adjustmentGroup)) {
            $json['adjustment_group']    = $this->adjustmentGroup;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
