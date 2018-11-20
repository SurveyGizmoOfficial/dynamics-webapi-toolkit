<?php
/**
 * Copyright 2018 AlexaCRM
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and
 * associated documentation files (the "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED,
 * INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR
 * PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS
 * BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
 * TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE
 * OR OTHER DEALINGS IN THE SOFTWARE.
 */

/*
 * Organization metadata serialization class map.
 */

use SurveyGizmo\Dynamics\WebAPI\Serializer\Reference;
use SurveyGizmo\Dynamics\Xrm\Metadata\AttributeTypeCode;

return [
    'SurveyGizmo\Dynamics\Xrm\Label' => [
        'LocalizedLabels' => ( new Reference( 'SurveyGizmo\Dynamics\Xrm\LocalizedLabel' ) )->makeMap( 'LanguageCode' ),
        'UserLocalizedLabel' => new Reference( 'SurveyGizmo\Dynamics\Xrm\LocalizedLabel' ),
    ],
    'SurveyGizmo\Dynamics\Xrm\Metadata\EntityMetadata' => [
        'Attributes' => ( new Reference( function( $data ) {
            if ( !is_object( $data ) || !isset( $data->AttributeType ) ) {
                return 'SurveyGizmo\Dynamics\Xrm\Metadata\AttributeMetadata';
            }

            $attrType = $data->AttributeType;

            /**
             * @var AttributeTypeCode $enum
             */
            $enum = AttributeTypeCode::$attrType();

            switch ( true ) {
                case $enum->is( AttributeTypeCode::Boolean ):
                    return 'SurveyGizmo\Dynamics\Xrm\Metadata\BooleanAttributeMetadata';
                case $enum->is( AttributeTypeCode::DateTime ):
                    return 'SurveyGizmo\Dynamics\Xrm\Metadata\DateTimeAttributeMetadata';
                case $enum->is( AttributeTypeCode::Decimal ):
                    return 'SurveyGizmo\Dynamics\Xrm\Metadata\DecimalAttributeMetadata';
                case $enum->is( AttributeTypeCode::Double ):
                    return 'SurveyGizmo\Dynamics\Xrm\Metadata\DoubleAttributeMetadata';
                case $enum->is( AttributeTypeCode::Integer ):
                    return 'SurveyGizmo\Dynamics\Xrm\Metadata\IntegerAttributeMetadata';
                case $enum->is( AttributeTypeCode::Memo ):
                    return 'SurveyGizmo\Dynamics\Xrm\Metadata\MemoAttributeMetadata';
                case $enum->is( AttributeTypeCode::Money ):
                    return 'SurveyGizmo\Dynamics\Xrm\Metadata\MoneyAttributeMetadata';
                case $enum->is( AttributeTypeCode::Picklist ):
                    return 'SurveyGizmo\Dynamics\Xrm\Metadata\PicklistAttributeMetadata';
                case $enum->is( AttributeTypeCode::State ):
                    return 'SurveyGizmo\Dynamics\Xrm\Metadata\StateAttributeMetadata';
                case $enum->is( AttributeTypeCode::Status ):
                    return 'SurveyGizmo\Dynamics\Xrm\Metadata\StatusAttributeMetadata';
                case $enum->is( AttributeTypeCode::String ):
                    return 'SurveyGizmo\Dynamics\Xrm\Metadata\StringAttributeMetadata';
                case $enum->is( AttributeTypeCode::Uniqueidentifier ):
                    return 'SurveyGizmo\Dynamics\Xrm\Metadata\UniqueIdentifierAttributeMetadata';
                case $enum->is( AttributeTypeCode::Customer ):
                case $enum->is( AttributeTypeCode::Lookup ):
                case $enum->is( AttributeTypeCode::Owner ):
                case $enum->is( AttributeTypeCode::PartyList ):
                    return 'SurveyGizmo\Dynamics\Xrm\Metadata\LookupAttributeMetadata';
                case $enum->is( AttributeTypeCode::BigInt ):
                    return 'SurveyGizmo\Dynamics\Xrm\Metadata\BigIntAttributeMetadata';
                case $enum->is( AttributeTypeCode::ManagedProperty ):
                    return 'SurveyGizmo\Dynamics\Xrm\Metadata\ManagedPropertyAttributeMetadata';
                case $enum->is( AttributeTypeCode::EntityName ):
                    return 'SurveyGizmo\Dynamics\Xrm\Metadata\EntityNameAttributeMetadata';
                default:
                    return 'SurveyGizmo\Dynamics\Xrm\Metadata\AttributeMetadata';
            }
        } ) )->makeMap( 'LogicalName' ),
        'CanBeInCustomEntityAssociation' => new Reference( 'SurveyGizmo\Dynamics\Xrm\ManagedProperty' ),
        'CanBeInManyToMany' => new Reference( 'SurveyGizmo\Dynamics\Xrm\ManagedProperty' ),
        'CanBePrimaryEntityInRelationship' => new Reference( 'SurveyGizmo\Dynamics\Xrm\ManagedProperty' ),
        'CanBeRelatedEntityInRelationship' => new Reference( 'SurveyGizmo\Dynamics\Xrm\ManagedProperty' ),
        'CanChangeHierarchicalRelationship' => new Reference( 'SurveyGizmo\Dynamics\Xrm\ManagedProperty' ),
        'CanChangeTrackingBeEnabled' => new Reference( 'SurveyGizmo\Dynamics\Xrm\ManagedProperty' ),
        'CanCreateAttributes' => new Reference( 'SurveyGizmo\Dynamics\Xrm\ManagedProperty' ),
        'CanCreateCharts' => new Reference( 'SurveyGizmo\Dynamics\Xrm\ManagedProperty' ),
        'CanCreateForms' => new Reference( 'SurveyGizmo\Dynamics\Xrm\ManagedProperty' ),
        'CanCreateViews' => new Reference( 'SurveyGizmo\Dynamics\Xrm\ManagedProperty' ),
        'CanEnableSyncToExternalSearchIndex' => new Reference( 'SurveyGizmo\Dynamics\Xrm\ManagedProperty' ),
        'CanModifyAdditionalSettings' => new Reference( 'SurveyGizmo\Dynamics\Xrm\ManagedProperty' ),
        'Description' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Label' ),
        'DisplayCollectionName' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Label' ),
        'DisplayName' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Label' ),
        'IsAuditEnabled' => new Reference( 'SurveyGizmo\Dynamics\Xrm\ManagedProperty' ),
        'IsConnectionsEnabled' => new Reference( 'SurveyGizmo\Dynamics\Xrm\ManagedProperty' ),
        'IsCustomizable' => new Reference( 'SurveyGizmo\Dynamics\Xrm\ManagedProperty' ),
        'IsDuplicateDetectionEnabled' => new Reference( 'SurveyGizmo\Dynamics\Xrm\ManagedProperty' ),
        'IsMailMergeEnabled' => new Reference( 'SurveyGizmo\Dynamics\Xrm\ManagedProperty' ),
        'IsMappable' => new Reference( 'SurveyGizmo\Dynamics\Xrm\ManagedProperty' ),
        'IsOfflineInMobileClient' => new Reference( 'SurveyGizmo\Dynamics\Xrm\ManagedProperty' ),
        'IsReadOnlyInMobileClient' => new Reference( 'SurveyGizmo\Dynamics\Xrm\ManagedProperty' ),
        'IsRenameable' => new Reference( 'SurveyGizmo\Dynamics\Xrm\ManagedProperty' ),
        'IsValidForQueue' => new Reference( 'SurveyGizmo\Dynamics\Xrm\ManagedProperty' ),
        'IsVisibleInMobile' => new Reference( 'SurveyGizmo\Dynamics\Xrm\ManagedProperty' ),
        'IsVisibleInMobileClient' => new Reference( 'SurveyGizmo\Dynamics\Xrm\ManagedProperty' ),
        'Keys' => ( new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\EntityKeyMetadata' ) )->makeMap( 'LogicalName' ),
        'ManyToManyRelationships' => ( new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\ManyToManyRelationshipMetadata' ) )->makeMap( 'SchemaName' ),
        'ManyToOneRelationships' => ( new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\OneToManyRelationshipMetadata' ) )->makeMap( 'SchemaName' ),
        'OneToManyRelationships' => ( new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\OneToManyRelationshipMetadata' ) )->makeMap( 'SchemaName' ),
        'OwnershipType' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\OwnershipTypes' ),
        'Privileges' => ( new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\SecurityPrivilegeMetadata' ) )->makeMap( 'Name' ),
    ],
    'SurveyGizmo\Dynamics\Xrm\Metadata\AssociatedMenuConfiguration' => [
        'Behavior' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\AssociatedMenuBehavior' ),
        'Group' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\AssociatedMenuGroup' ),
        'Label' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Label' ),
    ],
    'SurveyGizmo\Dynamics\Xrm\Metadata\AttributeMetadata' => [
        'AttributeType' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\AttributeTypeCode' ),
        'AttributeTypeName' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\AttributeTypeDisplayName' ),
        'CanModifyAdditionalSettings' => new Reference( 'SurveyGizmo\Dynamics\Xrm\ManagedProperty' ),
        'Description' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Label' ),
        'DisplayName' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Label' ),
        'IsAuditEnabled' => new Reference( 'SurveyGizmo\Dynamics\Xrm\ManagedProperty' ),
        'IsCustomizable' => new Reference( 'SurveyGizmo\Dynamics\Xrm\ManagedProperty' ),
        'IsGlobalFilterEnabled' => new Reference( 'SurveyGizmo\Dynamics\Xrm\ManagedProperty' ),
        'IsRenameable' => new Reference( 'SurveyGizmo\Dynamics\Xrm\ManagedProperty' ),
        'IsSortableEnabled' => new Reference( 'SurveyGizmo\Dynamics\Xrm\ManagedProperty' ),
        'IsValidForAdvancedFind' => new Reference( 'SurveyGizmo\Dynamics\Xrm\ManagedProperty' ),
        'RequiredLevel' => ( new Reference( 'SurveyGizmo\Dynamics\Xrm\ManagedProperty' ) )->addFieldCast( 'Value', new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\AttributeRequiredLevel' ) ),
    ],
    'SurveyGizmo\Dynamics\Xrm\Metadata\BooleanAttributeMetadata' => [
        'OptionSet' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\BooleanOptionSetMetadata' ),
    ],
    'SurveyGizmo\Dynamics\Xrm\Metadata\BooleanOptionSetMetadata' => [
        'FalseOption' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\OptionMetadata' ),
        'TrueOption' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\OptionMetadata' ),
    ],
    'SurveyGizmo\Dynamics\Xrm\Metadata\CascadeConfiguration' => [
        'Assign' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\CascadeType' ),
        'Delete' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\CascadeType' ),
        'Merge' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\CascadeType' ),
        'Reparent' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\CascadeType' ),
        'Share' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\CascadeType' ),
        'Unshare' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\CascadeType' ),
        'RollupView' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\CascadeType' ),
    ],
    'SurveyGizmo\Dynamics\Xrm\Metadata\DateTimeAttributeMetadata' => [
        'CanChangeDateTimeBehavior' => new Reference( 'SurveyGizmo\Dynamics\Xrm\ManagedProperty' ),
        'DateTimeBehavior' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\DateTimeBehavior' ),
        'Format' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\DateTimeFormat' ),
        'ImeMode' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\ImeMode' ),
    ],
    'SurveyGizmo\Dynamics\Xrm\Metadata\DecimalAttributeMetadata' => [
        'ImeMode' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\ImeMode' ),
    ],
    'SurveyGizmo\Dynamics\Xrm\Metadata\DoubleAttributeMetadata' => [
        'ImeMode' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\ImeMode' ),
    ],
    'SurveyGizmo\Dynamics\Xrm\Metadata\EntityKeyMetadata' => [
        'DisplayName' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Label' ),
        'EntityKeyIndexStatus' => new Reference( 'SurveyGizmo\Dynamics\Xrm\EntityKeyIndexStatus' ),
        'IsCustomizable' => new Reference( 'SurveyGizmo\Dynamics\Xrm\ManagedProperty' ),
    ],
    'SurveyGizmo\Dynamics\Xrm\Metadata\EnumAttributeMetadata' => [
        'OptionSet' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\OptionSetMetadata' ),
    ],
    'SurveyGizmo\Dynamics\Xrm\Metadata\IntegerAttributeMetadata' => [
        'Format' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\IntegerFormat' ),
    ],
    'SurveyGizmo\Dynamics\Xrm\Metadata\LookupAttributeMetadata' => [
        'Format' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\LookupFormat' ),
    ],
    'SurveyGizmo\Dynamics\Xrm\Metadata\ManyToManyRelationshipMetadata' => [
        'Entity1AssociatedMenuConfiguration' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\AssociatedMenuConfiguration' ),
        'Entity2AssociatedMenuConfiguration' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\AssociatedMenuConfiguration' ),
    ],
    'SurveyGizmo\Dynamics\Xrm\Metadata\MemoAttributeMetadata' => [
        'Format' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\StringFormat' ),
        'ImeMode' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\ImeMode' ),
    ],
    'SurveyGizmo\Dynamics\Xrm\Metadata\MoneyAttributeMetadata' => [
        'ImeMode' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\ImeMode' ),
    ],
    'SurveyGizmo\Dynamics\Xrm\Metadata\OneToManyRelationshipMetadata' => [
        'AssociatedMenuConfiguration' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\AssociatedMenuConfiguration' ),
        'CascadeConfiguration' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\CascadeConfiguration' ),
    ],
    'SurveyGizmo\Dynamics\Xrm\Metadata\OptionMetadata' => [
        'Description' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Label' ),
        'Label' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Label' ),
    ],
    'SurveyGizmo\Dynamics\Xrm\Metadata\OptionSetMetadata' => [
        'Options' => ( new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\OptionMetadata' ) )->makeMap( 'Value' ),
    ],
    'SurveyGizmo\Dynamics\Xrm\Metadata\OptionSetMetadataBase' => [
        'Description' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Label' ),
        'DisplayName' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Label' ),
        'IsCustomizable' => new Reference( 'SurveyGizmo\Dynamics\Xrm\ManagedProperty' ),
        'OptionSetType' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\OptionSetType' ),
    ],
    'SurveyGizmo\Dynamics\Xrm\Metadata\RelationshipMetadataBase' => [
        'IsCustomizable' => new Reference( 'SurveyGizmo\Dynamics\Xrm\ManagedProperty' ),
        'RelationshipType' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\RelationshipType' ),
        'SecurityTypes' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\SecurityTypes' ),
    ],
    'SurveyGizmo\Dynamics\Xrm\Metadata\SecurityPrivilegeMetadata' => [
        'PrivilegeType' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\PrivilegeType' ),
    ],
    'SurveyGizmo\Dynamics\Xrm\Metadata\StringAttributeMetadata' => [
        'Format' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\StringFormat' ),
        'FormatName' => new Reference( 'SurveyGizmo\Dynamics\Xrm\Metadata\StringFormatName' ),
    ],
];
