<x-main-layout>
    <x-slot name="header">
        <x-main-header></x-main-header>
    </x-slot>
    <style>
        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }

        .hidden {
            display: none;
        }
    </style>

    <div class="bg-white px-4 py-12 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-4xl">
            <div class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Post Ads</h1>
            </div>
            <!--
  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
            <form action="{{ route('postad-store') }}" method="POST" enctype="multipart/form-data" id="form">
                @csrf

                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-2 sm:col-start-1">
                                <label for="country" class="block text-sm font-medium text-gray-900">Country</label>
                                <select id="country" name="country" data-required
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    <option value="">Select Country</option>
                                    @foreach (App\Models\Country::all() as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="state" class="block text-sm font-medium text-gray-900">State</label>
                                <select id="state" name="state"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    <option value="">Select State</option>
                                </select>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="city" class="block text-sm font-medium text-gray-900">City</label>
                                <select id="city" name="city"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    <option value="">Select City</option>
                                </select>
                            </div>
                            {{-- <div class="sm:col-span-4">
                <label for="company_name" class="block text-sm/6 font-medium text-gray-900">Company Name</label>
                <div class="mt-2">
                  <input id="company_name" name="company_name" type="text" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                </div>
            </div> --}}

                            <div class="sm:col-span-2 sm:col-start-1">
                                <label for="contact_name" class="block text-sm/6 font-medium text-gray-900">Contact
                                    Name</label>
                                <div class="mt-2">
                                    <input type="text" name="contact_name" id="contact_name" data-required
                                        autocomplete="address-level2"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="phone" class="block text-sm/6 font-medium text-gray-900">Phone</label>
                                <div class="mt-2">
                                    <input type="text" name="phone" id="phone" autocomplete="address-level1"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                                </div>
                            </div>

                            {{-- <div class="sm:col-span-2">
                <label for="postal-code" class="block text-sm/6 font-medium text-gray-900">Fax</label>
                <div class="mt-2">
                  <input type="text" name="postal-code" id="postal-code" autocomplete="postal-code" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                </div>
              </div> --}}

                            <div class="sm:col-span-2">
                                <label for="email" class="block text-sm/6 font-medium text-gray-900">Email
                                    address</label>
                                <div class="mt-2">
                                    <input id="email" name="email" type="email" autocomplete="email"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="address" class="block text-sm/6 font-medium text-gray-900">Address</label>
                                <div class="mt-2">
                                    <input id="address" name="address" type="text" autocomplete="address"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="postal_code" class="block text-sm/6 font-medium text-gray-900">Postal
                                    Code</label>
                                <div class="mt-2">
                                    <input id="postal_code" name="postal_code" type="text" autocomplete="postal_code"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                                </div>
                            </div>

                            {{-- <div class="sm:col-span-4">
                <label for="company_name" class="block text-sm/6 font-medium text-gray-900">Website</label>
                <div class="mt-2">
                  <input id="company_name" name="company_name" type="text" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                </div>
              </div> --}}

                            {{-- <div class="sm:col-span-3">
            <label for="about" class="block text-sm/6 font-medium text-gray-900">Meta Description</label>
            <div class="mt-2">
              <textarea id="about" name="about" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"></textarea>
            </div>

          </div>
          <div class="sm:col-span-3">
            <label for="about" class="block text-sm/6 font-medium text-gray-900">Meta Keywords </label>
            <div class="mt-2">
              <textarea id="about" name="about" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"></textarea>
            </div>
          </div> --}}

                            <div class="col-span-full">
                                <label for="about" class="block text-sm/6 font-medium text-gray-900">Description
                                </label>
                                <div class="mt-2">
                                    <div id="editor"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                                    </div>
                                    <input type="hidden" name="description" id="hidden-content">
                                    {{-- <textarea id="about" name="about" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"></textarea> --}}
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="price" class="block text-sm/6 font-medium text-gray-900">Price
                                    (CAD)</label>
                                <div class="mt-2">
                                    <input id="price" name="price" type="text" autocomplete="price"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="file_input">Upload file</label>
                                <input accept="image/*" name="photos" id="file_input"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"
                                    aria-describedby="file_input_help" id="file_input" type="file">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-500" id="file_input_help">SVG,
                                    PNG, JPG or GIF (MAX. 800x400px).</p>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="youtube" class="block text-sm/6 font-medium text-gray-900">Youtube
                                    Link</label>
                                <div class="mt-2">
                                    <input type="text" name="youtube" id="youtube" autocomplete="given-name"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="border-b border-gray-900/10 pb-12">

                        <div class="mt-10 space-y-10">
                            <fieldset>
                                <label for="price" class="mt-1 text-sm/12 text-gray-600">Position of Ad</label>
                                <div class="mt-6 space-y-6">
                                    <div class="flex items-center gap-x-2">
                                        <input id="push-everything" name="ad_position" value="General Listing"
                                            type="radio"
                                            class="size-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        <label for="push-everything"
                                            class="block text-sm/6 font-medium text-gray-900">General Listing (90 Days
                                            Free Listing)</label>
                                    </div>
                                    <div class="flex items-center gap-x-2">
                                        <input id="push-email" name="ad_position" value="Special Listing"
                                            type="radio"
                                            class="size-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        <label for="push-email"
                                            class="block text-sm/6 font-medium text-gray-900">Special Listing</label>
                                    </div>
                                    <div class="flex items-center gap-x-2">
                                        <input id="push-nothing" name="ad_position" value="Featured Listing"
                                            type="radio"
                                            class="size-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        <label for="push-nothing"
                                            class="block text-sm/6 font-medium text-gray-900">Featured Listing</label>
                                    </div>
                                    <div class="flex items-center gap-x-2">
                                        <input id="push-nothing" name="ad_position" value="Sliding Ads"
                                            type="radio"
                                            class="size-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        <label for="push-nothing"
                                            class="block text-sm/6 font-medium text-gray-900">Sliding Ads</label>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <p class="mt-1 text-sm/12 text-gray-600">Price Plan</p>
                                <div class="mt-6 space-y-6">
                                    <div class="flex items-center gap-x-3">
                                        <input id="push-everything" name="price_plan" value="General Listing"
                                            type="radio"
                                            class="size-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        <label for="push-everything"
                                            class="block text-sm/6 font-medium text-gray-900">General Listing (90 Days
                                            Free Listing) (USD 0) per year</label>
                                    </div>
                                    <div class="flex items-center gap-x-3">
                                        <input id="push-email" name="price_plan" value="Special Listing"
                                            type="radio"
                                            class="size-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        <label for="push-email"
                                            class="block text-sm/6 font-medium text-gray-900">Special Listing (USD 0)
                                            per year</label>
                                    </div>
                                    <div class="flex items-center gap-x-3">
                                        <input id="push-nothing" name="price_plan" value="Featured Listing"
                                            type="radio"
                                            class="size-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        <label for="push-nothing"
                                            class="block text-sm/6 font-medium text-gray-900">Featured Listing (USD 0)
                                            per year</label>
                                    </div>
                                    <div class="flex items-center gap-x-3">
                                        <input id="push-nothing" name="price_plan" value="Sliding Ads"
                                            type="radio"
                                            class="size-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        <label for="push-nothing"
                                            class="block text-sm/6 font-medium text-gray-900">Sliding Ads (USD 0) per
                                            year</label>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="mt-2 ">
             <textarea style="height: 200px; width: 900px;">TERMS and CONDITIONS of USE
                                            Welcome to the www.nricommunication.com and www.nriweb.com web site (the "Web Site"). The goal of this Web Site is to provide you with one stop access to the most comprehensive network of Real estate, Rentals, Matrimonial, Buy sell, Directory and other products/services and related links to meet your needs (the "Content"). Please read our Terms of Use (the "Terms") carefully before continuing on with your use of this Web Site. These Terms shall govern the use of the Web Site and apply to all Internet traffic visiting the Web Site. By accessing or using this Web Site, you agree to the Terms. The Terms are meant to protect all of our Web Site visitors and your use of this Web Site signifies your agreement with these Terms. IF YOU DO NOT AGREE WITH THESE TERMS, DO NOT USE THIS WEB SITE. Nri Communication ("NriCommunication", "We", "Us", "Our") reserves the right, in its sole discretion, to modify, alter or otherwise update these Terms at any time. Such modifications shall be effective immediately upon posting. By using this Web Site after we have posted notice of such modifications, alterations or updates you agree to be bound by such revised Terms.

                                            In accordance with our goals, this Web Site will permit you to link to many other web sites, that may or may not be affiliated with this Web Site and/or www.nricommunication.com and www.nriweb.com, and that may have terms of use that differ from, or contain terms in addition to, the terms specified here. Your access to such web sites through links provided on this Web Site is governed by the terms of use and policies of those sites, not
                                            this Web Site.


                                            PRIVACY
                                            Registration data and certain other information about you is subject to our Privacy Policy. For more information,
                                            please review our full Privacy Policy which can be found on www.nricommunication.com and www.nriweb.com


                                            TRADEMARKS, COPYRIGHTS, AND RESTRICTIONS
                                            This Web site is controlled and operated by www.nricommunication.com and www.nriweb.com . All content on this Web Site, including, but not limited to text, images, illustrations, audio clips, and video clips, is protected by copyrights, trademarks, service marks, and/or other intellectual
                                            property rights (which are governed by Canada. and worldwide copyright laws and treaty provisions, privacy and publicity laws, and communication regulations and statutes), and are owned and controlled by www.nricommunication.com and www.nriweb.com or its affiliates, or by third party content providers, merchants, sponsors and licensors (collectively "Providers") that have licensed their content or the right to market their products and/or
                                            services to www.nricommunication.com and www.nriweb.com. Content on this Web Site or any web site owned, operated, licensed or controlled by the Providers is solely for your personal, non-commercial use. You may print a copy of the Content and/or information contained herein for your personal, non-commercial use only, but you may not copy, reproduce, republish, upload, post, transmit, distribute, and/or exploit the Content or information in any way (including by e-mail or other electronic means) for commercial use without the prior written consent of www.nricommunication.com and www.nriweb.com or the Providers. You may request consent by email a request to nriweb@hotmail.com Without the prior written consent of www.nricommunication.com and www.nriweb.com or the Providers, your modification of the Content, use of the Content on
                                            any other web site or networked computer environment, or use of the Content for any purpose other than personal, non-commercial use, violates the rights of the owners of the coldwellbanker.com and/or the Provider copyrights, trademarks or service marks and other proprietary rights, and is prohibited. As a condition to your use of this Web Site, you warrant to www.nricommunication.com and www.nriweb.com that you will not use our Web Site for any purpose that is unlawful or prohibited by these Terms, including without limitation the posting or transmitting any threatening, libelous, defamatory, obscene, scandalous, inflammatory, pornographic, or profane material. If you violate any of these Terms, your permission to use our Web Site immediately terminates without the necessity of any notice. www.nricommunication.com and www.nriweb.com retains the right to deny access to anyone at its discretion for any reason, including for violation of these Terms. You may not use on your web site any trademarks, service marks or copyrighted materials appearing on this Web Site, including but not limited to any logos or characters, without the express written consent of the owner of the mark or copyright. You may not frame or otherwise incorporate into another web site any of the Content or other materials on this Web Site without prior written consent of www.nricommunication.com and www.nriweb.com .


                                            PROHIBITED ACTIVITIES
                                            You are specifically prohibited from any use of this Web Site, and You agree not to use or permit others to use this Web Site, for any of the following: (a) take any action that imposes an unreasonable or disproportionately large load on the Web Site's infrastructure, including but not limited to "spam" or other such unsolicited mass e-mailing techniques; (b) disclose to, or share with, the assigned confirmation numbers and/or passwords with any unauthorized third parties or using the assigned confirmation numbers and/or passwords for any unauthorized purpose; (c)
                                            attempt to decipher, decompile, disassemble or reverse engineer any of the software or HTML code comprising or in any way making up a part of this Web Site; (d) upload, post, emailing or otherwise transmitting any information, Content, or proprietary rights that You do not have a right to transmit under any law or under contractual or fiduciary relationships; (e) violating any applicable local, state, national or international law, including,
                                            but not limited to, any regulations having the force of law; and, (f) using any robot, spider, intelligent agent, other automatic device, or manual process to search, monitor or copy Our Web pages, or the Content without Our prior written permission, provided that generally available third party Web browser such as Netscape Navigator® and Microsoft Internet Explorer® may be used without such permission.


                                            LINKS
                                            This Web Site may contain links to other web sites ("Linked Sites"). The Linked Sites are provided for your convenience and information only and, as such, you access them at your own risk. The content of any Linked Sites is not under www.nricommunication.com and www.nriweb.com 's control, and www.nricommunication.com and www.nriweb.com is not responsible for, and does not endorse, such content, whether or not www.nricommunication.com and www.nriweb.com is affiliated with the owners of such Linked Sites. You may not establish a hyperlink to this Web Site or provide any links that state or imply any sponsorship or endorsement of your web site by www.nricommunication.com and www.nriweb.com, or its affiliates or Providers.


                                            DISCLAIMER OF WARRANTIES AND LIABILITY
                                            ALL CONTENT ON THIS WEB SITE IS PROVIDED "AS IS" AND WITHOUT WARRANTIES OF ANY KIND EITHER EXPRESS OR IMPLIED. OTHER THAN THOSE WARRANTIES WHICH, UNDER THE U.S. LAWS APPLICABLE TO THESE TERMS, ARE IMPLIED BY LAW AND ARE INCAPABLE OF EXCLUSION, RESTRICTION, OR MODIFICATION, ABCDE DISCLAIMS ANY AND ALL WARRANTIES, EXPRESS OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE. NEITHER ABCDE, ITS AFFILIATED OR RELATED ENTITIES, NOR THE PROVIDERS, NOR ANY PERSON INVOLVED IN THE CREATION, PRODUCTION, AND DISTRIBUTION OF THIS WEB SITE WARRANT THAT THE FUNCTIONS CONTAINED IN THIS WEB SITE WILL BE UNINTERRUPTED OR ERROR-FREE, THAT DEFECTS WILL BE CORRECTED, OR THAT THE SERVER THAT MAKES THE CONTENT AVAILABLE WILL BE FREE OF VIRUSES OR OTHER HARMFUL COMPONENTS. THE CONTENT THAT YOU ACCESS ON THIS WEB SITE IS PROVIDED SOLELY
                                            FOR YOUR CONVENIENCE AND INFORMATION ONLY. www.nricommunication.com and www.nriweb.com DOES NOT WARRANT OR MAKE ANY  REPRESENTATIONS REGARDING THE RESULTS THAT MAY BE OBTAINED FROM THE USE OF THIS WEB SITE, OR AS TO THE RELIABILITY, ACCURACY OR CURRENCY OF ANY INFORMATION CONTENT, SERVICE AND/OR MERCHANDISE ACQUIRED PURSUANT TO YOUR USE OF THIS WEB SITE. YOU EXPRESSLY AGREE THAT USE OF THIS WEB SITE IS AT YOUR SOLE RISK. YOU (AND NOT ABCDE) ASSUME THE ENTIRE COST OF ALL NECESSARY SERVICING, REPAIR OR CORRECTION OF YOUR SYSTEM. YOU EXPRESSLY AGREE THAT NEITHER www.nricommunication.com and www.nriweb.com, NOR ITS AFFILIATED OR RELATED ENTITIES (INCLUDING ITS PROVIDERS), NOR ANY OF THEIR RESPECTIVE EMPLOYEES, OR AGENTS, NOR ANY PERSON
                                            OR ENTITY INVOLVED IN THE CREATION, PRODUCTION AND DISTRIBUTION OF THIS WEB SITE, IS RESPONSIBLE OR LIABLE TO ANY PERSON OR ENTITY WHATSOEVER FOR ANY LOSS, DAMAGE (WHETHER ACTUAL, CONSEQUENTIAL, PUNITIVE OR OTHERWISE), INJURY, CLAIM, LIABILITY OR OTHER CAUSE OF ANY KIND OR CHARACTER WHATSOEVER BASED UPON OR RESULTING FROM THE USE OR ATTEMPTED USE OF THIS WEB SITE OR
                                            ANY OTHER LINKED SITE. BY WAY OF EXAMPLE, AND WITHOUT LIMITING THE GENERALITY OF THE FOREGOING, ABCDE AND RELATED PERSONS AND ENTITIES SHALL NOT BE RESPONSIBLE OR LIABLE FOR ANY CLAIM OR DAMAGE ARISING FROM FAILURE OF PERFORMANCE, ERROR, OMISSION, INTERRUPTION, DELETION, DEFECT, DELAY IN OPERATION, COMPUTER VIRUS, THEFT, DESTRUCTION, UNAUTHORIZED ACCESS TO OR ALTERATION OF
                                            PERSONAL RECORDS, OR THE RELIANCE UPON OR USE OF DATA, INFORMATION, OPINIONS OR OTHER MATERIALS APPEARING ON THIS WEB SITE.  YOU EXPRESSLY ACKNOWLEDGE AND AGREE THAT ABCDE IS NOT LIABLE OR RESPONSIBLE FOR ANY DEFAMATORY, OFFENSIVE OR ILLEGAL CONDUCT OF OTHER SUBSCRIBERS OR THIRD PARTIES. SOME JURISDICTIONS MAY NOT ALLOW THE EXCLUSION OR LIMITATION OF LIABILITY FOR CONSEQUENTIAL OR INCIDENTAL DAMAGES. IN SUCH JURISDICTIONS, ABCDE'S LIABILITY IS LIMITED TO THE GREATEST EXTENT PERMITTED BY LAW.


                                            INDEMNIFICATION
                                            You agree to indemnify, defend, and hold harmless www.nricommunication.com and www.nriweb.com and the Providers, its and their officers, directors, employees, affiliates, agents, licensors, and suppliers from and against all losses, expenses, damages and costs, including reasonable attorneys' fees, resulting from any violation by you of these Terms


                                            THIRD PARTY RIGHTS
                                            These Terms are for the benefit of www.nricommunication.com and www.nriweb.com and its Providers, its and their officers, directors, employees, affiliates, agents, licensors, and suppliers. Each of these individuals or entities shall have the right to assert and enforce these Terms directly against you on its or their own behalf.


                                            JURISDICTIONAL ISSUES
                                            Unless otherwise specified, the Content contained in this Web Site is presented solely for your convenience and/or information. This Web Site is controlled and operated by www.nricommunication.com and www.nriweb.com from its office within Canada. www.nricommunication.com and www.nriweb.com makes no representation that Content in its Web Site is appropriate or available for use in other locations. Those who choose to access this Web Site from other locations do so on their own initiative and are responsible for compliance with local laws, if and to the extent local laws are applicable. You may not use or export the materials in this Web Site in violation of Canada export laws and regulations. These Terms shall be governed by, construed and enforced in accordance with the laws of the British Columbia, Canada, as they are applied to agreements
                                            entered into and to be performed entirely within such State. Any action you, any third party or www.nricommunication.com and www.nriweb.com brings to enforce these Terms, or in connection with any matters related to this Web Site, shall be brought only in either the Courts of British Columbia, Canada and you expressly consent to the jurisdiction of said courts. If any provision of these Terms shall be unlawful, void or for any reason unenforceable, then that provision shall be deemed sever able from these Terms and shall not affect the validity and enforceability of any remaining provisions.


                                            ENTIRE AGREEMENT
                                            The provisions and conditions of these Terms, and each obligation referenced herein, represent the entire Agreement between  www.nricommunication.com and www.nriweb.com, its affiliated or related entities, and you, and supersede any prior agreements or understandings not incorporated herein. In the event that any inconsistencies exist between these Terms and any future published terms of use or understanding, the last published Terms or terms of use or understanding shall prevail.

                                            ANY RIGHTS NOT EXPRESSLY GRANTED HEREIN ARE RESERVED BY www.nricommunication.com and www.nriweb.com .</textarea>

</div>


                            <div class="sm:col-span-4">
                                <div class="flex items-start mb-5">
                                    <div class="flex items-center h-5">

                                        <input id="terms" type="checkbox" value=""
                                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                                            required />
                                    </div>
                                    <label for="terms" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-500">I agree with the <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and
                                            conditions</a></label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
                    {{-- <button type="submit" id="preview-button" class="rounded-md bg-yellow-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Preview</button> --}}
                    <button type="button" id="preview-button"
                        class="rounded-md bg-yellow-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Preview</button>
                    {{-- <button type="submit" id="previewButton" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button> --}}
                </div>
            </form>

        </div>
    </div>

    <!-- Preview Modal -->
    <div id="preview-modal"
        class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center overflow-y-auto">
        <div class="bg-white rounded-lg p-6 shadow-lg w-full max-w-4xl">
            <h2 class="text-lg font-bold mb-4 text-center">Preview Details</h2>
            <hr class="my-4 border-t border-gray-300">
            <div id="previewContent" class="space-y-4 max-h-[75vh] overflow-y-auto">
                <p><strong>Country:</strong> <span id="previewCountry"></span></p>
                <p><strong>State:</strong> <span id="previewState"></span></p>
                <p><strong>City:</strong> <span id="previewCity"></span></p>
                <p><strong>Name:</strong> <span id="previewName"></span></p>
                <p><strong>Email:</strong> <span id="previewEmail"></span></p>
                <p><strong>Phone:</strong> <span id="previewPhone"></span></p>
                <p><strong>Address:</strong> <span id="previewAddress"></span></p>
                <p><strong>Postal Code:</strong> <span id="previewPostalCode"></span></p>
                <p><strong>Description:</strong> <span id="previewDescription"></span></p>
                <p><strong>Price:</strong> <span id="previewPrice"></span></p>
                <p><strong>Photo:</strong> <img id="previewPhoto" class="mt-2 max-w-[100px] max-h-[100px]"
                        alt="Uploaded Photo Preview"></p>
                <p><strong>Youtube Link:</strong> <span id="previewYoutubeLink"></span></p>
                <p><strong>Position of Ad:</strong> <span id="previewPlaceOfAd"></span></p>
                <p><strong>Price Plan:</strong> <span id="previewPricePlan"></span></p>
            </div>
            <hr class="my-4 border-t border-gray-300">
            <div class="flex justify-end space-x-4 mt-6">
                <button type="button" id="closeModal"
                    class="px-4 py-2 bg-gray-500 text-white rounded-md">Cancel</button>
                <button type="button" id="submitForm"
                    class="px-4 py-2 bg-blue-600 text-white rounded-md">Submit</button>
            </div>
        </div>
    </div>



    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const previewButton = document.getElementById('preview-button');
                const previewModal = document.getElementById('preview-modal');
                const closeModal = document.getElementById('closeModal'); // Close modal button
                const form = document.getElementById('form');

                // Modal fields
                const previewCountry = document.getElementById('previewCountry');
                const previewState = document.getElementById('previewState');
                const previewCity = document.getElementById('previewCity');
                const previewName = document.getElementById('previewName');
                const previewEmail = document.getElementById('previewEmail');
                const previewPhone = document.getElementById('previewPhone');
                const previewAddress = document.getElementById('previewAddress');
                const previewPostalCode = document.getElementById('previewPostalCode');
                const previewPrice = document.getElementById('previewPrice');
                const previewYoutubeLink = document.getElementById('previewYoutubeLink');
                const previewPlaceOfAd = document.getElementById('previewPlaceOfAd');
                const previewPricePlan = document.getElementById('previewPricePlan');
                const previewDescription = document.getElementById('previewDescription'); // Quill content
                const previewPhoto = document.getElementById('previewPhoto'); // Photo preview
                const fileInput = document.getElementById('file_input'); // File input

                // Initialize Quill Editor
                const quill = new Quill('#editor', {
                    theme: 'snow',
                });

                // Function to display error messages
                function showErrorMessage(element, message) {
                    let errorElement = element.nextElementSibling;
                    if (!errorElement || !errorElement.classList.contains('error-message')) {
                        errorElement = document.createElement('div');
                        errorElement.className = 'error-message';
                        errorElement.style.color = 'red';
                        errorElement.style.fontSize = '12px';
                        element.parentNode.insertBefore(errorElement, element.nextSibling);
                    }
                    errorElement.textContent = message;
                }

                // Function to clear error messages
                function clearErrorMessage(element) {
                    const errorElement = element.nextElementSibling;
                    if (errorElement && errorElement.classList.contains('error-message')) {
                        errorElement.textContent = '';
                    }
                }

                // Function to display error messages after the entire group
                function showGroupErrorMessage(container, message) {
                    let errorElement = container.querySelector('.error-message');
                    if (!errorElement) {
                        errorElement = document.createElement('div');
                        errorElement.className = 'error-message';
                        errorElement.style.color = 'red';
                        errorElement.style.fontSize = '12px';
                        errorElement.style.marginTop = '5px';
                        container.appendChild(errorElement);
                    }
                    errorElement.textContent = message;
                }

                // Function to clear group error messages
                function clearGroupErrorMessage(container) {
                    const errorElement = container.querySelector('.error-message');
                    if (errorElement) {
                        errorElement.remove();
                    }
                }

                // Function to validate the form
                function validateForm() {
                    let isValid = true;

                    // Clear previous error messages
                    const errorMessages = document.querySelectorAll('.error-message');
                    errorMessages.forEach((error) => error.remove());

                    // Validate required fields
                    const requiredFields = form.querySelectorAll('[data-required]');
                    requiredFields.forEach((field) => {
                        clearErrorMessage(field);

                        if (field.tagName === 'SELECT') {
                            if (!field.value.trim()) {
                                showErrorMessage(field, `Please select a value.`);
                                isValid = false;
                            }
                        } else if (field.type === 'radio' || field.type === 'checkbox') {
                            const name = field.name;
                            const checked = form.querySelector(`input[name="${name}"]:checked`);
                            if (!checked) {
                                showErrorMessage(field.parentNode, `Please select an option.`);
                                isValid = false;
                            }
                        } else if (!field.value.trim()) {
                            showErrorMessage(field, `This field is required.`);
                            isValid = false;
                        }
                    });

                    // Validate Quill Editor
                    const quillText = quill.getText().trim();
                    if (!quillText) {
                        showErrorMessage(document.querySelector('#editor'), `Description is required.`);
                        isValid = false;
                    }


                    // Validate Position of Ad
                    const adPositionContainer = document.querySelector('fieldset:nth-of-type(1) .space-y-6');
                    const adPositionChecked = document.querySelector('input[name="ad_position"]:checked');
                    if (!adPositionChecked) {
                        showGroupErrorMessage(adPositionContainer, `Please select a Position of Ad.`);
                        isValid = false;
                    } else {
                        clearGroupErrorMessage(adPositionContainer);
                    }

                    // Validate Price Plan
                    const pricePlanContainer = document.querySelector('fieldset:nth-of-type(2) .space-y-6');
                    const pricePlanChecked = document.querySelector('input[name="price_plan"]:checked');
                    if (!pricePlanChecked) {
                        showGroupErrorMessage(pricePlanContainer, `Please select a Price Plan.`);
                        isValid = false;
                    } else {
                        clearGroupErrorMessage(pricePlanContainer);
                    }

                    // Validate Terms and Conditions
                    const termsCheckbox = document.getElementById('terms');
                    const termsContainer = termsCheckbox.closest('.flex.items-start');
                    if (!termsCheckbox.checked) {
                        showGroupErrorMessage(termsContainer, `You must agree to the terms and conditions.`);
                        isValid = false;
                    } else {
                        clearGroupErrorMessage(termsContainer);
                    }

                    return isValid;
                }

                // Function to populate modal
                function populateModal() {
                    // Populate form fields
                    const countrySelect = document.getElementById('country');
                    previewCountry.textContent = countrySelect.options[countrySelect.selectedIndex]?.text || 'No Country Selected';

                    const stateSelect = document.getElementById('state');
                    previewState.textContent = stateSelect.options[stateSelect.selectedIndex]?.text || 'No State Selected';

                    const citySelect = document.getElementById('city');
                    previewCity.textContent = citySelect.options[citySelect.selectedIndex]?.text || 'No City Selected';

                    previewName.textContent = document.getElementById('contact_name').value || 'No Name Provided';
                    previewEmail.textContent = document.getElementById('email').value || 'No Email Provided';
                    previewPhone.textContent = document.getElementById('phone').value || 'No Phone Number Provided';
                    previewAddress.textContent = document.getElementById('address').value || 'No Address Provided';
                    previewPostalCode.textContent = document.getElementById('postal_code').value || 'No Postal Code Provided';
                    previewPrice.textContent = document.getElementById('price').value || 'No Price Provided';
                    previewYoutubeLink.textContent = document.getElementById('youtube').value || 'No YouTube Link Provided';

                    const selectedAdPosition = document.querySelector('input[name="ad_position"]:checked');
                    previewPlaceOfAd.textContent = selectedAdPosition ? selectedAdPosition.value : 'No Position Selected';

                    const selectedPricePlan = document.querySelector('input[name="price_plan"]:checked');
                    previewPricePlan.textContent = selectedPricePlan ? selectedPricePlan.value : 'No Price Plan Selected';

                    // Populate Quill Editor content
                    previewDescription.innerHTML = quill.root.innerHTML.trim() || 'No Description Provided';

                    // Populate photo preview
                    const file = fileInput.files[0];
                    if (file && file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = (event) => {
                            previewPhoto.src = event.target.result;
                            previewPhoto.classList.remove('hidden');
                        };
                        reader.readAsDataURL(file);
                    } else {
                        previewPhoto.src = '';
                        previewPhoto.classList.add('hidden');
                    }
                }

                // Event listener for preview button
                previewButton.addEventListener('click', (event) => {
                    event.preventDefault();
                    if (validateForm()) {
                        populateModal();
                        previewModal.classList.remove('hidden');
                    }
                });

                // Close modal logic
                closeModal.addEventListener('click', () => {
                    previewModal.classList.add('hidden');
                });

                // Add event listeners to clear error messages on input
                form.querySelectorAll('[data-required]').forEach((field) => {
                    field.addEventListener('input', () => clearErrorMessage(field));
                });

                // Add event listeners to clear error messages on radio

                document.querySelectorAll('input[name="ad_position"]').forEach((radio) => {
                    radio.addEventListener('change', () => {
                        const adPositionContainer = document.querySelector(
                            'fieldset:nth-of-type(1) .space-y-6');
                        clearGroupErrorMessage(adPositionContainer);
                    });
                });

                document.querySelectorAll('input[name="price_plan"]').forEach((radio) => {
                    radio.addEventListener('change', () => {
                        const pricePlanContainer = document.querySelector(
                            'fieldset:nth-of-type(2) .space-y-6');
                        clearGroupErrorMessage(pricePlanContainer);
                    });
                });

                // Add event listeners to clear error messages on checkbox

                const termsCheckbox = document.getElementById('terms');
                termsCheckbox.addEventListener('change', () => {
                    const termsContainer = termsCheckbox.closest('.flex.items-start');
                    clearGroupErrorMessage(termsContainer);
                });

                // For Quill Editor (clear error when user types)
                quill.on('text-change', () => {
                    clearErrorMessage(document.querySelector('#editor'));
                });
            });


            $(document).ready(function() {
                $('#country').on('change', function() {
                    var country_id = $(this).val();
                    $('#state').html('<option value="">Select State</option>');
                    $('#city').html('<option value="">Select City</option>');

                    if (country_id) {
                        $.ajax({
                            url: "{{ route('getStates', '') }}/" + country_id,
                            type: 'GET',
                            success: function(states) {
                                $.each(states, function(key, state) {
                                    $('#state').append('<option value="' + state.id + '">' +
                                        state.name + '</option>');
                                });
                            }
                        });
                    }
                });

                $('#state').on('change', function() {
                    var state_id = $(this).val();
                    $('#city').html('<option value="">Select City</option>');

                    if (state_id) {
                        $.ajax({
                            url: "{{ route('getCities', '') }}/" + state_id,
                            type: 'GET',
                            success: function(cities) {
                                $.each(cities, function(key, city) {
                                    $('#city').append('<option value="' + city.id + '">' +
                                        city.name + '</option>');
                                });
                            }
                        });
                    }
                });
            });
        </script>
    @endpush
    <x-main-footer></x-main-footer>
</x-main-layout>
