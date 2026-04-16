<footer class=" py-12 px-6" style="background-color: #275936;">
        <div class="max-w-7xl mx-auto">
            <!-- Logo and Description -->
            <div class="text-center mb-12">
                <div class="flex items-center justify-center mb-6">
                    <img src="{{ asset($setting->logo) }}" alt="logo" class="w-8 h-8 mr-2">
                    <h1 class="text-3xl font-bold text-white"> {{ $setting->company_name }}</h1>
                </div>
                <p class="text-white max-w-7xl mx-auto leading-relaxed">
                   {{ $setting->company_description }}
                </p>
            </div>


              <!-- Social Media Icons -->
            <div class="flex justify-center space-x-4 mt-12 mb-8">
                <a href="#" class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white hover:bg-blue-700">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white hover:from-purple-600 hover:to-pink-600">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center text-white hover:bg-red-700">
                    <i class="fab fa-youtube"></i>
                </a>
                <a href="#" class="w-10 h-10 bg-blue-700 rounded-full flex items-center justify-center text-white hover:bg-blue-800">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <!-- Contact Us Section -->
                <div>
                    <h3 class="text-xl font-bold text-white mb-6">CONTACT US</h3>
                    
                    <!-- Customer Care -->
                    <div class="mb-6">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-phone text-orange-400 mr-2"></i>
                            <span class="text-white font-medium">Customer Care</span>
                        </div>
                        <div class="text-2xl font-bold text-white mb-1">{{ $setting->customer_care_phone_1 }}</div>
                        <div class="text-sm text-white">{{ $setting->customer_care_phone_2 }} (WhatsApp Only)</div>
                        <div class="text-sm text-white">{{ $setting->customer_care_email }}</div>
                    </div>

                    <!-- Corporate Sales -->
                    <div class="mb-6">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-briefcase text-orange-400 mr-2"></i>
                            <span class="text-white font-medium">Corporate Sales & Retailer Only</span>
                        </div>
                        <div class="text-sm text-white mb-1">{{ $setting->corporate_phone }} (WhatsApp Available)</div>
                        <div class="text-sm text-white mb-1">{{ $setting->corporate_email }}</div>
                        <div class="text-sm text-white mb-1">(E.g. Pharmaceuticals, Banks, Insurances & other Corporate Houses)</div>
                        <div class="text-sm text-white">Or CLICK to know more</div>
                    </div>

                    <!-- Investment -->
                    <div>
                        <div class="flex items-center mb-2">
                            <i class="fas fa-chart-line text-orange-400 mr-2"></i>
                            <span class="text-white font-medium">Investment Only</span>
                        </div>
                        <div class="text-sm text-white mb-1">{{ $setting->investment_phone }} (WhatsApp Available)</div>
                        <div class="text-sm text-white">{{ $setting->investment_email }}</div>
                    </div>
                </div>

                <!-- Head Office Section -->
                <div>
                    <h3 class="text-xl font-bold text-white mb-6">Head Office</h3>
                    <div class="mb-4">
                        <p class="text-white mb-2">{{ $setting->office_address }}</p>
                        <p class="text-white mb-4">{{ $setting->general_email }}</p>
                        <button class="bg-gray-800 text-white px-4 py-2 rounded text-sm flex items-center">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            VIEW MAP
                        </button>
                    </div>
                    
                    <div class="mt-8">
                        <h4 class="text-lg font-bold text-white mb-4">DOWNLOAD OUR APP</h4>
                        <a href="{{ $setting->google_play_link }}" class="inline-block">
                            <img src="https://www.khaasfood.com/wp-content/uploads/2020/06/download-1-1-150x57.png" alt="Get it on Google Play" class="h-12">
                        </a>
                    </div>
                </div>

                <!-- Useful Links Section -->
                <div>
                    <h3 class="text-xl font-bold text-white mb-6">USEFUL LINKS</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-white hover:text-white">Privacy Policy</a></li>
                        
                        <li><a href="#" class="text-white hover:text-white">FAQs</a></li>
                       
                    </ul>
                </div>
            </div>

          

            <!-- Payment Methods and Copyright -->
            <div class="border-t border-gray-300 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="text-sm text-white mb-4 md:mb-0">
                        © Pahartheke @2025
                    </div>
                    <div class="flex flex-wrap items-center space-x-2">
                        <!-- Payment method icons -->
                        <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 40 25' fill='%23000080'%3E%3Crect width='40' height='25' rx='3' fill='%23000080'/%3E%3Ctext x='20' y='15' text-anchor='middle' fill='white' font-size='8'%3EVisa%3C/text%3E%3C/svg%3E" alt="Visa" class="h-6">
                        <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 40 25' fill='%23ff5f00'%3E%3Crect width='40' height='25' rx='3' fill='%23ff5f00'/%3E%3Ctext x='20' y='15' text-anchor='middle' fill='white' font-size='6'%3EMaster%3C/text%3E%3C/svg%3E" alt="Mastercard" class="h-6">
                        <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 40 25' fill='%2300457C'%3E%3Crect width='40' height='25' rx='3' fill='%2300457C'/%3E%3Ctext x='20' y='15' text-anchor='middle' fill='white' font-size='7'%3EAmex%3C/text%3E%3C/svg%3E" alt="American Express" class="h-6">
                        <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 40 25' fill='%23003087'%3E%3Crect width='40' height='25' rx='3' fill='%23003087'/%3E%3Ctext x='20' y='15' text-anchor='middle' fill='white' font-size='6'%3EPayPal%3C/text%3E%3C/svg%3E" alt="PayPal" class="h-6">
                        <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 40 25' fill='%23e31837'%3E%3Crect width='40' height='25' rx='3' fill='%23e31837'/%3E%3Ctext x='20' y='15' text-anchor='middle' fill='white' font-size='6'%3EbKash%3C/text%3E%3C/svg%3E" alt="bKash" class="h-6">
                        <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 40 25' fill='%23ed1c24'%3E%3Crect width='40' height='25' rx='3' fill='%23ed1c24'/%3E%3Ctext x='20' y='15' text-anchor='middle' fill='white' font-size='6'%3ERocket%3C/text%3E%3C/svg%3E" alt="Rocket" class="h-6">
                        <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 40 25' fill='%23008000'%3E%3Crect width='40' height='25' rx='3' fill='%23008000'/%3E%3Ctext x='20' y='15' text-anchor='middle' fill='white' font-size='6'%3ENagad%3C/text%3E%3C/svg%3E" alt="Nagad" class="h-6">
                        <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 40 25' fill='%236b46c1'%3E%3Crect width='40' height='25' rx='3' fill='%236b46c1'/%3E%3Ctext x='20' y='15' text-anchor='middle' fill='white' font-size='5'%3ESSL COM%3C/text%3E%3C/svg%3E" alt="SSL Commerz" class="h-6">
                    </div>
                </div>
            </div>
        </div>

        <!-- Chat Widget -->
        <div class="fixed bottom-6 right-6">
            
            <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center text-white shadow-lg cursor-pointer hover:bg-green-600">
                <i class="fas fa-comments"></i>
            </div>
        </div>
    </footer>