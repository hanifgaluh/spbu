<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>SPBU Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/sytle.css" type="text/css">
    <script>
        console.log("Fuel Prices Data:", @json($bbms -> pluck('hrg_jual', 'kd_bbm') -> toArray()));

        window.fuelPrices = @json($bbms -> mapWithKeys(function($bbm) {
            return [(string) $bbm -> kd_bbm => (float) $bbm -> hrg_jual];
        }));
    </script>


    <script src="{{ asset('js/main.js') }}" defer></script>

</head>

<body>
    <div class="dashboard">
        <div class="header">
            <h1>Dashboard SPBU</h1>
        </div>


        <div class="stats-container">
            <!-- Row 1: Daily Stats -->
            <div class="stats-row">
                <div class="stat-card">
                    <i class="fas fa-users"></i>
                    <div class="stat-value">{{ $userToday }}</div>
                    <div class="stat-label">Pembeli Hari Ini</div>
                </div>
                <div class="stat-card">
                    <i class="fas fa-money-bill-wave"></i>
                    <div class="stat-value">Rp {{ number_format($profitToday, 0, ',', '.') }}</div>
                    <div class="stat-label">Profit Hari Ini</div>
                </div>
                <div class="stat-card">
                    <i class="fas fa-shopping-cart"></i>
                    <div class="stat-value">Rp {{ number_format($totalHariIni, 0, ',', '.') }}</div>
                    <div class="stat-label">Pengeluaran Hari Ini ({{ $today }})</div>
                </div>
            </div>

            <!-- Row 2: Monthly Stats -->
            <div class="stats-row-secondary">
                <div class="stat-card">
                    <i class="fas fa-calendar-check"></i>
                    <div class="stat-value">Rp {{ number_format(                    $profitBulanIni
                        , 0, ',', '.') }}</div>
                    <div class="stat-label">Profit Bulan Ini</div>
                </div>
                <div class="stat-card">
                    <i class="fas fa-calendar-minus"></i>
                    <div class="stat-value">Rp {{ number_format(                    $totalBulanIni
                        , 0, ',', '.') }}</div>
                    <div class="stat-label">Pengeluaran Bulan Ini</div>
                </div>
            </div>
        </div>

        <div class="buttons-container">
            <button class="btn" onclick="showTransactionForm()">
                <i class="fas fa-plus"></i> Tambah Transaksi
            </button>
            <button class="btn" onclick="showSupplyForm()">
                <i class="fas fa-truck"></i> Tambah Supply
            </button>
        </div>

        <div class="fuel-status">
            <h2>Status BBM</h2>
            <div class="fuel-bars">
                <div>
                    <p>Pertalite</p>
                    <div class="fuel-bar">
                        <div class="fuel-level" style="width: 75%;"></div>
                    </div>
                    <div class="fuel-info">
                        <span>Tersedia:</span>
                        <span class="fuel-amount">{{ $bbms -> where('kd_bbm', '1') -> first() -> ltr_bbm }} Liter</span>
                    </div>
                </div>
                <div>
                    <p>Pertamax</p>
                    <div class="fuel-bar">
                        <div class="fuel-level" style="width: 60%;"></div>
                    </div>
                    <div class="fuel-info">
                        <span>Tersedia:</span>
                        <span class="fuel-amount">{{ $bbms -> where('kd_bbm', '2') -> first() -> ltr_bbm }} Literr</span>
                    </div>
                </div>
                <div>
                    <p>Solar</p>
                    <div class="fuel-bar">
                        <div class="fuel-level" style="width: 85%;"></div>
                    </div>
                    <div class="fuel-info">
                        <span>Tersedia:</span>
                        <span class="fuel-amount">{{ $bbms -> where('kd_bbm', '3') -> first() -> ltr_bbm }} Liter</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- New Logs Section -->
        <div class="logs-section">
            <div class="tabs">
                <button class="tab-btn active" onclick="switchTab('transactions')">Log Transaksi</button>
                <button class="tab-btn" onclick="switchTab('supply')">Log Penambahan Supply</button>
            </div>

            <div id="transactions" class="tab-content active">
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Nama Pembeli</th>
                                <th>Jenis BBM</th>
                                <th>Jumlah (L)</th>
                                <th>Harga/L</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2024-10-19</td>
                                <td>John Doe</td>
                                <td>Pertalite</td>
                                <td>20</td>
                                <td>Rp 10.000</td>
                                <td>Rp 200.000</td>
                            </tr>
                            <tr>
                                <td>2024-10-19</td>
                                <td>Jane Smith</td>
                                <td>Pertamax</td>
                                <td>15</td>
                                <td>Rp 12.500</td>
                                <td>Rp 187.500</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="supply" class="tab-content">
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Supplier</th>
                                <th>Jenis BBM</th>
                                <th>Jumlah (L)</th>
                                <th>Harga/L</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($supplies as $supply)
                            <tr>
                                <td>{{ $supply->tgl_beli }}</td>
                                <td>{{ $supply->nm_supp }}</td>
                                <td>{{ $supply->jns_bbm }}</td>
                                <td>{{ $supply->jml_bbm }}</td>
                                <td>Rp {{ number_format($supply->hrg_beli, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($supply->hrg_total, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Transaksi -->
    <div id="transactionModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeTransactionModal()">&times;</span>
            <h2>Tambah Transaksi</h2>

            <!-- Indikator Langkah -->
            <div class="steps-indicator">
                <span class="step active" id="step1-indicator">1</span>
                <span class="step" id="step2-indicator">2</span>
            </div>

            <!-- Form Multi-Step -->
            <form action="{{ route('transactions.store') }}" method="POST" id="transactionForm">
                @csrf

                <!-- Step 1: Data Pembeli -->
                <div id="step1" class="step">
                    <div class="form-group">
                        <label>Nama Pembeli:</label>
                        <input type="text" id="nm_pel" name="nm_pel" value="{{ old('nm_pel') }}" required>
                        @error('nm_pel')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email Pembeli:</label>
                        <input type="email" id="email_pel" name="email_pel" value="{{ old('email') }}" required>
                    </div>
                    <div class="form-group">
                        <label>No. HP Pembeli:</label>
                        <input type="text" id="telp_pel" name="telp_pel" value="{{ old('telp_pel') }}" required>
                        @error('telp_pel')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Tanggal Transaksi:</label>
                        <input type="date" id="tgl_beli" name="tgl_beli" value="{{ old('tgl_beli') }}" required>
                        @error('tgl_beli')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="button" class="btn" onclick="nextStep(2)">Next</button>
                </div>

                <!-- Step 2: Detail Transaksi -->
                <div id="step2" class="step" style="display: none;">
                    <div class="form-group">
                        <label>Jenis BBM:</label>
                        <select id="fuelType" name="kd_bbm" onchange="updatePrice()" required>
                            <option value="">Pilih BBM</option>
                            @foreach ($bbms as $bbm)
                            <option value="{{ $bbm->kd_bbm }}" {{ old('kd_bbm') == $bbm->kd_bbm ? 'selected' : '' }}>
                                {{ $bbm->nm_bbm }}
                            </option>
                            @endforeach
                        </select>


                        @error('kd_bbm')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Jumlah Liter:</label>
                        <input type="number" id="liters" name="qty_dtl_jual" value="{{ old('qty_dtl_jual') }}" oninput="calculateTotal()" required>
                        @error('liters')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Harga per Liter:</label>
                        <input type="number" id="pricePerLiter" name="hrg_jual" value="{{ old('hrg_jual') }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Total Harga:</label>
                        <input type="number" id="totalPrice" name="tot_jual" value="{{ old('totalPrice') }}" readonly>
                    </div>
                    <button type="button" class="btn" onclick="prevStep(1)">Back</button>
                    <br>
                    <button type="submit" class="btn">Simpan</button>
                </div>
            </form>
        </div>
    </div>



    <!-- Modal Supply -->
    <!-- Modal untuk Tambah Supply -->
    <div id="supplyModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeSupplyModal()">&times;</span>
            <h2>Tambah Supply</h2>
            <form id="supplyForm" action="{{ route('supply.store') }}" method="POST">
                @csrf <!-- Tambahkan CSRF token untuk keamanan form -->
                <div class="form-group">
                    <label>Nama Supplier:</label>
                    <input type="text" name="nm_supp" required>
                </div>
                <div class="form-group">
                    <label>Jenis BBM:</label>
                    <select name="jns_bbm" required>
                        <option value="">Pilih BBM</option>
                        <option value="pertalite">Pertalite</option>
                        <option value="pertamax">Pertamax</option>
                        <option value="solar">Solar</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Jumlah Liter:</label>
                    <input type="number" name="jml_bbm" required>
                </div>
                <div class="form-group">
                    <label>Harga per Liter:</label>
                    <input type="number" name="hrg_beli">
                </div>
                <!-- <div class="form-group">
                <label>Total Harga:</label>
                <input type="number" name="hrg_total" readonly>
            </div> -->
                <div class="form-group">
                    <label>Tanggal Pembelian:</label>
                    <input type="date" name="tgl_beli" required>
                </div>
                <button type="submit" class="btn">Simpan</button>
            </form>
        </div>
    </div>

    <script type="text/javascript" src="/js/main.js"></script>
</body>

</html>