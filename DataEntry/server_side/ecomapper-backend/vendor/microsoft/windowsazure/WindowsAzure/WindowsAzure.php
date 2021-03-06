<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0.
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * PHP version 5
 *
 * @category   Microsoft
 *
 * @author     Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link       https://github.com/windowsazure/azure-sdk-for-php
 * @deprecated deprecated since version 0.4.2 and replaced by vendor/autoload.php
 */
trigger_error(sprintf('Usage of `%s` has been deprecated since version 0.4.2 and will be removed in 0.5.0. '.
   'Please use `vendor/autoload.php` instead, which is generated during the install process by Composer.', __FILE__), E_USER_DEPRECATED);
spl_autoload_register(
   function ($class) {
      static $classes = null;
      if ($classes === null) {
          $classes = array(
            'windowsazure\\common\\cloudconfigurationmanager' => '/Common/CloudConfigurationManager.php',
            'windowsazure\\common\\internal\\atom\\atombase' => '/Common/Internal/Atom/AtomBase.php',
            'windowsazure\\common\\internal\\atom\\atomlink' => '/Common/Internal/Atom/AtomLink.php',
            'windowsazure\\common\\internal\\atom\\category' => '/Common/Internal/Atom/Category.php',
            'windowsazure\\common\\internal\\atom\\content' => '/Common/Internal/Atom/Content.php',
            'windowsazure\\common\\internal\\atom\\entry' => '/Common/Internal/Atom/Entry.php',
            'windowsazure\\common\\internal\\atom\\feed' => '/Common/Internal/Atom/Feed.php',
            'windowsazure\\common\\internal\\atom\\generator' => '/Common/Internal/Atom/Generator.php',
            'windowsazure\\common\\internal\\atom\\person' => '/Common/Internal/Atom/Person.php',
            'windowsazure\\common\\internal\\atom\\source' => '/Common/Internal/Atom/Source.php',
            'windowsazure\\common\\internal\\authentication\\iauthscheme' => '/Common/Internal/Authentication/IAuthScheme.php',
            'windowsazure\\common\\internal\\authentication\\oauthscheme' => '/Common/Internal/Authentication/OAuthScheme.php',
            'windowsazure\\common\\internal\\authentication\\sharedkeyauthscheme' => '/Common/Internal/Authentication/SharedKeyAuthScheme.php',
            'windowsazure\\common\\internal\\authentication\\storageauthscheme' => '/Common/Internal/Authentication/StorageAuthScheme.php',
            'windowsazure\\common\\internal\\authentication\\tablesharedkeyliteauthscheme' => '/Common/Internal/Authentication/TableSharedKeyLiteAuthScheme.php',
            'windowsazure\\common\\internal\\connectionstringparser' => '/Common/Internal/ConnectionStringParser.php',
            'windowsazure\\common\\internal\\connectionstringsource' => '/Common/Internal/ConnectionStringSource.php',
            'windowsazure\\common\\internal\\filterableservice' => '/Common/Internal/FilterableService.php',
            'windowsazure\\common\\internal\\filters\\authenticationfilter' => '/Common/Internal/Filters/AuthenticationFilter.php',
            'windowsazure\\common\\internal\\filters\\datefilter' => '/Common/Internal/Filters/DateFilter.php',
            'windowsazure\\common\\internal\\filters\\exponentialretrypolicy' => '/Common/Internal/Filters/ExponentialRetryPolicy.php',
            'windowsazure\\common\\internal\\filters\\headersfilter' => '/Common/Internal/Filters/HeadersFilter.php',
            'windowsazure\\common\\internal\\filters\\retrypolicy' => '/Common/Internal/Filters/RetryPolicy.php',
            'windowsazure\\common\\internal\\filters\\retrypolicyfilter' => '/Common/Internal/Filters/RetryPolicyFilter.php',
            'windowsazure\\common\\internal\\filters\\wrapfilter' => '/Common/Internal/Filters/WrapFilter.php',
            'windowsazure\\common\\internal\\http\\batchrequest' => '/Common/Internal/Http/BatchRequest.php',
            'windowsazure\\common\\internal\\http\\batchresponse' => '/Common/Internal/Http/BatchResponse.php',
            'windowsazure\\common\\internal\\http\\httpcallcontext' => '/Common/Internal/Http/HttpCallContext.php',
            'windowsazure\\common\\internal\\http\\httpclient' => '/Common/Internal/Http/HttpClient.php',
            'windowsazure\\common\\internal\\http\\ihttpclient' => '/Common/Internal/Http/IHttpClient.php',
            'windowsazure\\common\\internal\\http\\iurl' => '/Common/Internal/Http/IUrl.php',
            'windowsazure\\common\\internal\\http\\url' => '/Common/Internal/Http/Url.php',
            'windowsazure\\common\\internal\\invalidargumenttypeexception' => '/Common/Internal/InvalidArgumentTypeException.php',
            'windowsazure\\common\\internal\\iservicefilter' => '/Common/Internal/IServiceFilter.php',
            'windowsazure\\common\\internal\\logger' => '/Common/Internal/Logger.php',
            'windowsazure\\common\\internal\\mediaservicessettings' => '/Common/Internal/MediaServicesSettings.php',
            'windowsazure\\common\\internal\\oauthrestproxy' => '/Common/Internal/OAuthRestProxy.php',
            'windowsazure\\common\\internal\\resources' => '/Common/Internal/Resources.php',
            'windowsazure\\common\\internal\\restproxy' => '/Common/Internal/RestProxy.php',
            'windowsazure\\common\\internal\\serialization\\iserializer' => '/Common/Internal/Serialization/ISerializer.php',
            'windowsazure\\common\\internal\\serialization\\jsonserializer' => '/Common/Internal/Serialization/JsonSerializer.php',
            'windowsazure\\common\\internal\\serialization\\xmlserializer' => '/Common/Internal/Serialization/XmlSerializer.php',
            'windowsazure\\common\\internal\\servicebussettings' => '/Common/Internal/ServiceBusSettings.php',
            'windowsazure\\common\\internal\\servicemanagementsettings' => '/Common/Internal/ServiceManagementSettings.php',
            'windowsazure\\common\\internal\\servicerestproxy' => '/Common/Internal/ServiceRestProxy.php',
            'windowsazure\\common\\internal\\servicesettings' => '/Common/Internal/ServiceSettings.php',
            'windowsazure\\common\\internal\\storageservicesettings' => '/Common/Internal/StorageServiceSettings.php',
            'windowsazure\\common\\internal\\utilities' => '/Common/Internal/Utilities.php',
            'windowsazure\\common\\internal\\validate' => '/Common/Internal/Validate.php',
            'windowsazure\\common\\models\\getservicepropertiesresult' => '/Common/Models/GetServicePropertiesResult.php',
            'windowsazure\\common\\models\\logging' => '/Common/Models/Logging.php',
            'windowsazure\\common\\models\\metrics' => '/Common/Models/Metrics.php',
            'windowsazure\\common\\models\\oauthaccesstoken' => '/Common/Models/OAuthAccessToken.php',
            'windowsazure\\common\\models\\retentionpolicy' => '/Common/Models/RetentionPolicy.php',
            'windowsazure\\common\\models\\serviceproperties' => '/Common/Models/ServiceProperties.php',
            'windowsazure\\common\\serviceexception' => '/Common/ServiceException.php',
            'windowsazure\\common\\servicesbuilder' => '/Common/ServicesBuilder.php',
            'windowsazure\\mediaservices\\internal\\contentpropertiesserializer' => '/MediaServices/Internal/ContentPropertiesSerializer.php',
            'windowsazure\\mediaservices\\internal\\imediaservices' => '/MediaServices/Internal/IMediaServices.php',
            'windowsazure\\mediaservices\\mediaservicesrestproxy' => '/MediaServices/MediaServicesRestProxy.php',
            'windowsazure\\mediaservices\\models\\accesspolicy' => '/MediaServices/Models/AccessPolicy.php',
            'windowsazure\\mediaservices\\models\\asset' => '/MediaServices/Models/Asset.php',
            'windowsazure\\mediaservices\\models\\assetdeliverypolicy' => '/MediaServices/Models/AssetDeliveryPolicy.php',
            'windowsazure\\mediaservices\\models\\assetdeliverypolicyconfigurationkey' => '/MediaServices/Models/AssetDeliveryPolicyConfigurationKey.php',
            'windowsazure\\mediaservices\\models\\assetdeliverypolicytype' => '/MediaServices/Models/AssetDeliveryPolicyType.php',
            'windowsazure\\mediaservices\\models\\assetdeliveryprotocol' => '/MediaServices/Models/AssetDeliveryProtocol.php',
            'windowsazure\\mediaservices\\models\\assetfile' => '/MediaServices/Models/AssetFile.php',
            'windowsazure\\mediaservices\\models\\contentkey' => '/MediaServices/Models/ContentKey.php',
            'windowsazure\\mediaservices\\models\\contentkeyauthorizationpolicy' => '/MediaServices/Models/ContentKeyAuthorizationPolicy.php',
            'windowsazure\\mediaservices\\models\\contentkeyauthorizationpolicyoption' => '/MediaServices/Models/ContentKeyAuthorizationPolicyOption.php',
            'windowsazure\\mediaservices\\models\\contentkeyauthorizationpolicyrestriction' => '/MediaServices/Models/ContentKeyAuthorizationPolicyRestriction.php',
            'windowsazure\\mediaservices\\models\\contentkeydeliverytype' => '/MediaServices/Models/ContentKeyDeliveryType.php',
            'windowsazure\\mediaservices\\models\\contentkeyrestrictiontype' => '/MediaServices/Models/ContentKeyRestrictionType.php',
            'windowsazure\\mediaservices\\models\\contentkeytypes' => '/MediaServices/Models/ContentKeyTypes.php',
            'windowsazure\\mediaservices\\models\\encodingreservedunit' => '/MediaServices/Models/EncodingReservedUnit.php',
            'windowsazure\\mediaservices\\models\\encodingreservedunittype' => '/MediaServices/Models/EncodingReservedUnitType.php',
            'windowsazure\\mediaservices\\models\\encryptionschemes' => '/MediaServices/Models/EncryptionSchemes.php',
            'windowsazure\\mediaservices\\models\\errordetail' => '/MediaServices/Models/ErrorDetail.php',
            'windowsazure\\mediaservices\\models\\ingestmanifest' => '/MediaServices/Models/IngestManifest.php',
            'windowsazure\\mediaservices\\models\\ingestmanifestasset' => '/MediaServices/Models/IngestManifestAsset.php',
            'windowsazure\\mediaservices\\models\\ingestmanifestfile' => '/MediaServices/Models/IngestManifestFile.php',
            'windowsazure\\mediaservices\\models\\ingestmanifeststatistics' => '/MediaServices/Models/IngestManifestStatistics.php',
            'windowsazure\\mediaservices\\models\\job' => '/MediaServices/Models/Job.php',
            'windowsazure\\mediaservices\\models\\jobtemplate' => '/MediaServices/Models/JobTemplate.php',
            'windowsazure\\mediaservices\\models\\locator' => '/MediaServices/Models/Locator.php',
            'windowsazure\\mediaservices\\models\\mediaprocessor' => '/MediaServices/Models/MediaProcessor.php',
            'windowsazure\\mediaservices\\models\\protectionkeytypes' => '/MediaServices/Models/ProtectionKeyTypes.php',
            'windowsazure\\mediaservices\\models\\storageaccount' => '/MediaServices/Models/StorageAccount.php',
            'windowsazure\\mediaservices\\models\\task' => '/MediaServices/Models/Task.php',
            'windowsazure\\mediaservices\\models\\taskhistoricalevent' => '/MediaServices/Models/TaskHistoricalEvent.php',
            'windowsazure\\mediaservices\\models\\taskoptions' => '/MediaServices/Models/TaskOptions.php',
            'windowsazure\\mediaservices\\models\\tasktemplate' => '/MediaServices/Models/TaskTemplate.php',
            'windowsazure\\mediaservices\\templates\\agcandcolorstriperestriction' => '/MediaServices/Templates/AgcAndColorStripeRestriction.php',
            'windowsazure\\mediaservices\\templates\\allowedtracktypes' => '/MediaServices/Templates/AllowedTrackTypes.php',
            'windowsazure\\mediaservices\\templates\\asymmetrictokenverificationkey' => '/MediaServices/Templates/AsymmetricTokenVerificationKey.php',
            'windowsazure\\mediaservices\\templates\\contentencryptionkeyfromheader' => '/MediaServices/Templates/ContentEncryptionKeyFromHeader.php',
            'windowsazure\\mediaservices\\templates\\contentencryptionkeyfromkeyidentifier' => '/MediaServices/Templates/ContentEncryptionKeyFromKeyIdentifier.php',
            'windowsazure\\mediaservices\\templates\\contentkeyspecs' => '/MediaServices/Templates/ContentKeySpecs.php',
            'windowsazure\\mediaservices\\templates\\errormessages' => '/MediaServices/Templates/ErrorMessages.php',
            'windowsazure\\mediaservices\\templates\\explicitanalogtelevisionrestriction' => '/MediaServices/Templates/ExplicitAnalogTelevisionRestriction.php',
            'windowsazure\\mediaservices\\templates\\hdcp' => '/MediaServices/Templates/Hdcp.php',
            'windowsazure\\mediaservices\\templates\\mediaserviceslicensetemplateserializer' => '/MediaServices/Templates/MediaServicesLicenseTemplateSerializer.php',
            'windowsazure\\mediaservices\\templates\\openidconnectdiscoverydocument' => '/MediaServices/Templates/OpenIdConnectDiscoveryDocument.php',
            'windowsazure\\mediaservices\\templates\\playreadycontentkey' => '/MediaServices/Templates/PlayReadyContentKey.php',
            'windowsazure\\mediaservices\\templates\\playreadylicenseresponsetemplate' => '/MediaServices/Templates/PlayReadyLicenseResponseTemplate.php',
            'windowsazure\\mediaservices\\templates\\playreadylicensetemplate' => '/MediaServices/Templates/PlayReadyLicenseTemplate.php',
            'windowsazure\\mediaservices\\templates\\playreadylicensetype' => '/MediaServices/Templates/PlayReadyLicenseType.php',
            'windowsazure\\mediaservices\\templates\\playreadyplayright' => '/MediaServices/Templates/PlayReadyPlayRight.php',
            'windowsazure\\mediaservices\\templates\\requiredoutputprotection' => '/MediaServices/Templates/RequiredOutputProtection.php',
            'windowsazure\\mediaservices\\templates\\scmsrestriction' => '/MediaServices/Templates/ScmsRestriction.php',
            'windowsazure\\mediaservices\\templates\\symmetricverificationkey' => '/MediaServices/Templates/SymmetricVerificationKey.php',
            'windowsazure\\mediaservices\\templates\\tokenclaim' => '/MediaServices/Templates/TokenClaim.php',
            'windowsazure\\mediaservices\\templates\\tokenrestrictiontemplate' => '/MediaServices/Templates/TokenRestrictionTemplate.php',
            'windowsazure\\mediaservices\\templates\\tokenrestrictiontemplateserializer' => '/MediaServices/Templates/TokenRestrictionTemplateSerializer.php',
            'windowsazure\\mediaservices\\templates\\tokentype' => '/MediaServices/Templates/TokenType.php',
            'windowsazure\\mediaservices\\templates\\tokenverificationkey' => '/MediaServices/Templates/TokenVerificationKey.php',
            'windowsazure\\mediaservices\\templates\\unknownoutputpassingoption' => '/MediaServices/Templates/UnknownOutputPassingOption.php',
            'windowsazure\\mediaservices\\templates\\widevinemessage' => '/MediaServices/Templates/WidevineMessage.php',
            'windowsazure\\mediaservices\\templates\\widevinemessageserializer' => '/MediaServices/Templates/WidevineMessageSerializer.php',
            'windowsazure\\mediaservices\\templates\\x509certtokenverificationkey' => '/MediaServices/Templates/X509CertTokenVerificationKey.php',
            'windowsazure\\servicebus\\internal\\action' => '/ServiceBus/Internal/Action.php',
            'windowsazure\\servicebus\\internal\\activetoken' => '/ServiceBus/Internal/ActiveToken.php',
            'windowsazure\\servicebus\\internal\\filter' => '/ServiceBus/Internal/Filter.php',
            'windowsazure\\servicebus\\internal\\iservicebus' => '/ServiceBus/Internal/IServiceBus.php',
            'windowsazure\\servicebus\\internal\\iwrap' => '/ServiceBus/Internal/IWrap.php',
            'windowsazure\\servicebus\\internal\\wrapaccesstokenresult' => '/ServiceBus/Internal/WrapAccessTokenResult.php',
            'windowsazure\\servicebus\\internal\\wraprestproxy' => '/ServiceBus/Internal/WrapRestProxy.php',
            'windowsazure\\servicebus\\internal\\wraptokenmanager' => '/ServiceBus/Internal/WrapTokenManager.php',
            'windowsazure\\servicebus\\models\\brokeredmessage' => '/ServiceBus/Models/BrokeredMessage.php',
            'windowsazure\\servicebus\\models\\brokerproperties' => '/ServiceBus/Models/BrokerProperties.php',
            'windowsazure\\servicebus\\models\\correlationfilter' => '/ServiceBus/Models/CorrelationFilter.php',
            'windowsazure\\servicebus\\models\\emptyruleaction' => '/ServiceBus/Models/EmptyRuleAction.php',
            'windowsazure\\servicebus\\models\\falsefilter' => '/ServiceBus/Models/FalseFilter.php',
            'windowsazure\\servicebus\\models\\listoptions' => '/ServiceBus/Models/ListOptions.php',
            'windowsazure\\servicebus\\models\\listqueuesoptions' => '/ServiceBus/Models/ListQueuesOptions.php',
            'windowsazure\\servicebus\\models\\listqueuesresult' => '/ServiceBus/Models/ListQueuesResult.php',
            'windowsazure\\servicebus\\models\\listrulesoptions' => '/ServiceBus/Models/ListRulesOptions.php',
            'windowsazure\\servicebus\\models\\listrulesresult' => '/ServiceBus/Models/ListRulesResult.php',
            'windowsazure\\servicebus\\models\\listsubscriptionsoptions' => '/ServiceBus/Models/ListSubscriptionsOptions.php',
            'windowsazure\\servicebus\\models\\listsubscriptionsresult' => '/ServiceBus/Models/ListSubscriptionsResult.php',
            'windowsazure\\servicebus\\models\\listtopicsoptions' => '/ServiceBus/Models/ListTopicsOptions.php',
            'windowsazure\\servicebus\\models\\listtopicsresult' => '/ServiceBus/Models/ListTopicsResult.php',
            'windowsazure\\servicebus\\models\\queuedescription' => '/ServiceBus/Models/QueueDescription.php',
            'windowsazure\\servicebus\\models\\queueinfo' => '/ServiceBus/Models/QueueInfo.php',
            'windowsazure\\servicebus\\models\\receivemessageoptions' => '/ServiceBus/Models/ReceiveMessageOptions.php',
            'windowsazure\\servicebus\\models\\receivemode' => '/ServiceBus/Models/ReceiveMode.php',
            'windowsazure\\servicebus\\models\\ruledescription' => '/ServiceBus/Models/RuleDescription.php',
            'windowsazure\\servicebus\\models\\ruleinfo' => '/ServiceBus/Models/RuleInfo.php',
            'windowsazure\\servicebus\\models\\sqlfilter' => '/ServiceBus/Models/SqlFilter.php',
            'windowsazure\\servicebus\\models\\sqlruleaction' => '/ServiceBus/Models/SqlRuleAction.php',
            'windowsazure\\servicebus\\models\\subscriptiondescription' => '/ServiceBus/Models/SubscriptionDescription.php',
            'windowsazure\\servicebus\\models\\subscriptioninfo' => '/ServiceBus/Models/SubscriptionInfo.php',
            'windowsazure\\servicebus\\models\\topicdescription' => '/ServiceBus/Models/TopicDescription.php',
            'windowsazure\\servicebus\\models\\topicinfo' => '/ServiceBus/Models/TopicInfo.php',
            'windowsazure\\servicebus\\models\\truefilter' => '/ServiceBus/Models/TrueFilter.php',
            'windowsazure\\servicebus\\servicebusrestproxy' => '/ServiceBus/ServiceBusRestProxy.php',
            'windowsazure\\servicemanagement\\internal\\iservicemanagement' => '/ServiceManagement/Internal/IServiceManagement.php',
            'windowsazure\\servicemanagement\\internal\\service' => '/ServiceManagement/Internal/Service.php',
            'windowsazure\\servicemanagement\\internal\\windowsazureservice' => '/ServiceManagement/Internal/WindowsAzureService.php',
            'windowsazure\\servicemanagement\\models\\affinitygroup' => '/ServiceManagement/Models/AffinityGroup.php',
            'windowsazure\\servicemanagement\\models\\asynchronousoperationresult' => '/ServiceManagement/Models/AsynchronousOperationResult.php',
            'windowsazure\\servicemanagement\\models\\changedeploymentconfigurationoptions' => '/ServiceManagement/Models/ChangeDeploymentConfigurationOptions.php',
            'windowsazure\\servicemanagement\\models\\createaffinitygroupoptions' => '/ServiceManagement/Models/CreateAffinityGroupOptions.php',
            'windowsazure\\servicemanagement\\models\\createdeploymentoptions' => '/ServiceManagement/Models/CreateDeploymentOptions.php',
            'windowsazure\\servicemanagement\\models\\createserviceoptions' => '/ServiceManagement/Models/CreateServiceOptions.php',
            'windowsazure\\servicemanagement\\models\\deployment' => '/ServiceManagement/Models/Deployment.php',
            'windowsazure\\servicemanagement\\models\\deploymentslot' => '/ServiceManagement/Models/DeploymentSlot.php',
            'windowsazure\\servicemanagement\\models\\deploymentstatus' => '/ServiceManagement/Models/DeploymentStatus.php',
            'windowsazure\\servicemanagement\\models\\getaffinitygrouppropertiesresult' => '/ServiceManagement/Models/GetAffinityGroupPropertiesResult.php',
            'windowsazure\\servicemanagement\\models\\getdeploymentoptions' => '/ServiceManagement/Models/GetDeploymentOptions.php',
            'windowsazure\\servicemanagement\\models\\getdeploymentresult' => '/ServiceManagement/Models/GetDeploymentResult.php',
            'windowsazure\\servicemanagement\\models\\gethostedservicepropertiesoptions' => '/ServiceManagement/Models/GetHostedServicePropertiesOptions.php',
            'windowsazure\\servicemanagement\\models\\gethostedservicepropertiesresult' => '/ServiceManagement/Models/GetHostedServicePropertiesResult.php',
            'windowsazure\\servicemanagement\\models\\getoperationstatusresult' => '/ServiceManagement/Models/GetOperationStatusResult.php',
            'windowsazure\\servicemanagement\\models\\getstorageservicekeysresult' => '/ServiceManagement/Models/GetStorageServiceKeysResult.php',
            'windowsazure\\servicemanagement\\models\\getstorageservicepropertiesresult' => '/ServiceManagement/Models/GetStorageServicePropertiesResult.php',
            'windowsazure\\servicemanagement\\models\\hostedservice' => '/ServiceManagement/Models/HostedService.php',
            'windowsazure\\servicemanagement\\models\\inputendpoint' => '/ServiceManagement/Models/InputEndpoint.php',
            'windowsazure\\servicemanagement\\models\\keytype' => '/ServiceManagement/Models/KeyType.php',
            'windowsazure\\servicemanagement\\models\\listaffinitygroupsresult' => '/ServiceManagement/Models/ListAffinityGroupsResult.php',
            'windowsazure\\servicemanagement\\models\\listhostedservicesresult' => '/ServiceManagement/Models/ListHostedServicesResult.php',
            'windowsazure\\servicemanagement\\models\\listlocationsresult' => '/ServiceManagement/Models/ListLocationsResult.php',
            'windowsazure\\servicemanagement\\models\\liststorageservicesresult' => '/ServiceManagement/Models/ListStorageServicesResult.php',
            'windowsazure\\servicemanagement\\models\\location' => '/ServiceManagement/Models/Location.php',
            'windowsazure\\servicemanagement\\models\\mode' => '/ServiceManagement/Models/Mode.php',
            'windowsazure\\servicemanagement\\models\\operationstatus' => '/ServiceManagement/Models/OperationStatus.php',
            'windowsazure\\servicemanagement\\models\\role' => '/ServiceManagement/Models/Role.php',
            'windowsazure\\servicemanagement\\models\\roleinstance' => '/ServiceManagement/Models/RoleInstance.php',
            'windowsazure\\servicemanagement\\models\\storageservice' => '/ServiceManagement/Models/StorageService.php',
            'windowsazure\\servicemanagement\\models\\updateserviceoptions' => '/ServiceManagement/Models/UpdateServiceOptions.php',
            'windowsazure\\servicemanagement\\models\\upgradedeploymentoptions' => '/ServiceManagement/Models/UpgradeDeploymentOptions.php',
            'windowsazure\\servicemanagement\\models\\upgradestatus' => '/ServiceManagement/Models/UpgradeStatus.php',
            'windowsazure\\servicemanagement\\servicemanagementrestproxy' => '/ServiceManagement/ServiceManagementRestProxy.php',
            'windowsazure\\serviceruntime\\internal\\acquirecurrentstate' => '/ServiceRuntime/Internal/AcquireCurrentState.php',
            'windowsazure\\serviceruntime\\internal\\channelnotavailableexception' => '/ServiceRuntime/Internal/ChannelNotAvailableException.php',
            'windowsazure\\serviceruntime\\internal\\chunkedgoalstatedeserializer' => '/ServiceRuntime/Internal/ChunkedGoalStateDeserializer.php',
            'windowsazure\\serviceruntime\\internal\\currentstate' => '/ServiceRuntime/Internal/CurrentState.php',
            'windowsazure\\serviceruntime\\internal\\currentstatus' => '/ServiceRuntime/Internal/CurrentStatus.php',
            'windowsazure\\serviceruntime\\internal\\fileinputchannel' => '/ServiceRuntime/Internal/FileInputChannel.php',
            'windowsazure\\serviceruntime\\internal\\fileoutputchannel' => '/ServiceRuntime/Internal/FileOutputChannel.php',
            'windowsazure\\serviceruntime\\internal\\goalstate' => '/ServiceRuntime/Internal/GoalState.php',
            'windowsazure\\serviceruntime\\internal\\icurrentstateserializer' => '/ServiceRuntime/Internal/ICurrentStateSerializer.php',
            'windowsazure\\serviceruntime\\internal\\igoalstatedeserializer' => '/ServiceRuntime/Internal/IGoalStateDeserializer.php',
            'windowsazure\\serviceruntime\\internal\\iinputchannel' => '/ServiceRuntime/Internal/IInputChannel.php',
            'windowsazure\\serviceruntime\\internal\\ioutputchannel' => '/ServiceRuntime/Internal/IOutputChannel.php',
            'windowsazure\\serviceruntime\\internal\\iroleenvironmentchange' => '/ServiceRuntime/Internal/IRoleEnvironmentChange.php',
            'windowsazure\\serviceruntime\\internal\\iroleenvironmentdatadeserializer' => '/ServiceRuntime/Internal/IRoleEnvironmentDataDeserializer.php',
            'windowsazure\\serviceruntime\\internal\\iruntimeclient' => '/ServiceRuntime/Internal/IRuntimeClient.php',
            'windowsazure\\serviceruntime\\internal\\iruntimeclientfactory' => '/ServiceRuntime/Internal/IRuntimeClientFactory.php',
            'windowsazure\\serviceruntime\\internal\\iruntimecurrentstateclient' => '/ServiceRuntime/Internal/IRuntimeCurrentStateClient.php',
            'windowsazure\\serviceruntime\\internal\\iruntimegoalstateclient' => '/ServiceRuntime/Internal/IRuntimeGoalStateClient.php',
            'windowsazure\\serviceruntime\\internal\\localresource' => '/ServiceRuntime/Internal/LocalResource.php',
            'windowsazure\\serviceruntime\\internal\\protocol1runtimeclient' => '/ServiceRuntime/Internal/Protocol1RuntimeClient.php',
            'windowsazure\\serviceruntime\\internal\\protocol1runtimeclientfactory' => '/ServiceRuntime/Internal/Protocol1RuntimeClientFactory.php',
            'windowsazure\\serviceruntime\\internal\\protocol1runtimecurrentstateclient' => '/ServiceRuntime/Internal/Protocol1RuntimeCurrentStateClient.php',
            'windowsazure\\serviceruntime\\internal\\protocol1runtimegoalstateclient' => '/ServiceRuntime/Internal/Protocol1RuntimeGoalStateClient.php',
            'windowsazure\\serviceruntime\\internal\\releasecurrentstate' => '/ServiceRuntime/Internal/ReleaseCurrentState.php',
            'windowsazure\\serviceruntime\\internal\\role' => '/ServiceRuntime/Internal/Role.php',
            'windowsazure\\serviceruntime\\internal\\roleenvironmentconfigurationsettingchange' => '/ServiceRuntime/Internal/RoleEnvironmentConfigurationSettingChange.php',
            'windowsazure\\serviceruntime\\internal\\roleenvironmentdata' => '/ServiceRuntime/Internal/RoleEnvironmentData.php',
            'windowsazure\\serviceruntime\\internal\\roleenvironmentnotavailableexception' => '/ServiceRuntime/Internal/RoleEnvironmentNotAvailableException.php',
            'windowsazure\\serviceruntime\\internal\\roleenvironmenttopologychange' => '/ServiceRuntime/Internal/RoleEnvironmentTopologyChange.php',
            'windowsazure\\serviceruntime\\internal\\roleinstance' => '/ServiceRuntime/Internal/RoleInstance.php',
            'windowsazure\\serviceruntime\\internal\\roleinstanceendpoint' => '/ServiceRuntime/Internal/RoleInstanceEndpoint.php',
            'windowsazure\\serviceruntime\\internal\\roleinstancestatus' => '/ServiceRuntime/Internal/RoleInstanceStatus.php',
            'windowsazure\\serviceruntime\\internal\\runtimekernel' => '/ServiceRuntime/Internal/RuntimeKernel.php',
            'windowsazure\\serviceruntime\\internal\\runtimeversionmanager' => '/ServiceRuntime/Internal/RuntimeVersionManager.php',
            'windowsazure\\serviceruntime\\internal\\runtimeversionprotocolclient' => '/ServiceRuntime/Internal/RuntimeVersionProtocolClient.php',
            'windowsazure\\serviceruntime\\internal\\xmlcurrentstateserializer' => '/ServiceRuntime/Internal/XmlCurrentStateSerializer.php',
            'windowsazure\\serviceruntime\\internal\\xmlgoalstatedeserializer' => '/ServiceRuntime/Internal/XmlGoalStateDeserializer.php',
            'windowsazure\\serviceruntime\\internal\\xmlroleenvironmentdatadeserializer' => '/ServiceRuntime/Internal/XmlRoleEnvironmentDataDeserializer.php',
            'windowsazure\\serviceruntime\\roleenvironment' => '/ServiceRuntime/RoleEnvironment.php',
          );
      }
      $cn = strtolower($class);
      if (isset($classes[$cn])) {
          require __DIR__.$classes[$cn];
      }
   }
);
