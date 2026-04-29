@extends('admin.layout.master')

@section('title', 'Analyses et performances — Lepetitflacon')

@section('content')
    <section class="dashboard-section active" id="analytics">
        <div class="section-header mb-4" style="margin-bottom: 20px" >
            <h2 class="h4">Analyses des ventes et des performances</h2>
            <p class="text-dim">Une vue approfondie des performances de votre boutique et de la croissance de vos ventes</p>
        </div>

        <!-- KPI Cards -->
        <div class="stats-grid staggered-entry">
            <!-- Total Sales -->
            <div class="stat-card">
                <div class="stat-card__header">
                    <div class="stat-card__icon revenue"><i class="fas fa-dollar-sign"></i></div>
                    {{-- <span class="stat-card__trend up"><i class="fas fa-caret-up"></i> 12%</span> --}}
                </div>
                <div class="stat-card__body">
                    <div class="stat-card__value">{{ number_format($kpis['total_sales'], 2) }} DH</div>
                    <div class="stat-card__label">Ventes totales</div>
                </div>
            </div>

            <!-- Orders Count -->
            <div class="stat-card">
                <div class="stat-card__header">
                    <div class="stat-card__icon orders"><i class="fas fa-shopping-bag"></i></div>
                    {{-- <span class="stat-card__trend up"><i class="fas fa-caret-up"></i> 5%</span> --}}
                </div>
                <div class="stat-card__body">
                    <div class="stat-card__value">{{ number_format($kpis['total_orders']) }}</div>
                    <div class="stat-card__label">Nombre de commandes</div>
                </div>
            </div>

            <!-- Total Customers -->
            <div class="stat-card">
                <div class="stat-card__header">
                    <div class="stat-card__icon customers"><i class="fas fa-users"></i></div>
                    {{-- <span class="stat-card__trend up"><i class="fas fa-caret-up"></i> 8%</span> --}}
                </div>
                <div class="stat-card__body">
                    <div class="stat-card__value">{{ number_format($kpis['total_customers']) }}</div>
                    <div class="stat-card__label">Nombre total de clients</div>
                </div>
            </div>

            <!-- Avg Order Value -->
            <div class="stat-card">
                <div class="stat-card__header">
                    <div class="stat-card__icon products"><i class="fas fa-chart-line"></i></div>
                    {{-- <span class="stat-card__trend up"><i class="fas fa-caret-up"></i> 3%</span> --}}
                </div>
                <div class="stat-card__body">
                    <div class="stat-card__value">{{ number_format($kpis['avg_order_value'], 2) }} DH</div>
                    <div class="stat-card__label">Valeur moyenne des commandes</div>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="charts-row staggered-entry" style="margin-top: 30px">
            <!-- Revenue Trends -->
            <div class="chart-card">
                <div class="chart-card__header">
                    <h3>Tendances des revenus (6 derniers mois)</h3>
                   
                </div>
                <div style="height: 300px; position: relative;">
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>

            <!-- Top Selling Products -->
            {{-- <div class="table-card">
                <div class="table-card__header">
                    <h3>Produits les plus vendus</h3>
                </div>
                <div class="top-list-premium p-3">
                    @forelse($topProducts as $item)
                        <div class="premium-item">
                            <div class="item-rank">{{ $loop->iteration }}</div>
                            <div class="item-info">
                                <h4>{{ $item->product->name }}</h4>
                                <span>{{ number_format($item->total_qty) }} ventes</span>
                            </div>
                            <div class="item-stats text-left">
                                <div class="item-count">{{ number_format($item->total_revenue, 2) }} DH</div>
                                <div class="item-meta">Revenus</div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-4 text-dim">Aucune donnée disponible</div>
                    @endforelse
                </div>
            </div> --}}
        </div>


        <!-- Third Row: Recent Orders & Activities -->
        <div class=" staggered-entry" style="margin-top: 30px">
            <!-- Recent Orders -->
            <div class="table-card glass-card" style="flex: 2">
                <div class="table-card__header">
                    <div class="title-with-icon">
                        <i class="fas fa-shopping-cart" style="color: var(--color-gold)"></i>
                        <h3>Dernières commandes</h3>
                    </div>
                    {{-- <a href="#" class="btn btn-outline btn-sm"
                        onclick="document.querySelector('[data-section=orders]').click()">Voir tout <i
                            class="fas fa-arrow-right"></i></a> --}}
                </div>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>N° commande</th>
                            <th>Client</th>
                            <th>Montant</th>
                            <th>Statut</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentOrders->take(6) as $order)
                            <tr>
                                <td style="font-weight:700; color:var(--color-gold)">#ORD-{{ $order->id }}</td>
                                <td>
                                    <div class="user-inline">
                                        <span class="avatar-sm">{{ mb_substr($order->user->name ?? '?', 0, 1) }}</span>
                                        {{ $order->user->name ?? 'Client inconnu' }}
                                    </div>
                                </td>
                                <td style="font-weight:700">{{ number_format($order->total) }} DH</td>
                                <td>
                                    <span class="status-badge {{ $order->status }}">
                                        @if ($order->status == 'completed')
                                            Terminée
                                        @elseif($order->status == 'pending')
                                            En attente
                                        @elseif($order->status == 'shipped')
                                            Expédiée
                                        @else
                                            {{ $order->status }}
                                        @endif
                                    </span>
                                </td>
                                <td class="text-dim">{{ $order->created_at->format('Y/m/d') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Aucune commande récente</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Recent Activities Timeline -->
            {{-- <div class="chart-card glass-card" style="flex: 1">
                <div class="chart-card__header">
                    <div class="title-with-icon">
                        <i class="fas fa-history" style="color: var(--color-info)"></i>
                        <h3>Historique des activités</h3>
                    </div>
                    <button class="btn-text">Tout</button>
                </div>
                <div class="activity-timeline-modern mini">
                    @foreach ($recentActivities->take(6) as $log)
                        <div class="timeline-item">
                            <div class="timeline-dot-wrapper">
                                <div
                                    class="timeline-dot 
                        @if (str_contains($log->action, 'إضافة')) success 
                        @elseif(str_contains($log->action, 'حذف')) error 
                        @else info @endif">
                                </div>
                            </div>
                            <div class="timeline-content">
                                <div class="content-header">
                                    <span class="action-type">{{ $log->action }}</span>
                                    <span class="time">{{ $log->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="description">{{ $log->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div> --}}
        </div>

        <!-- Top Customers Table -->
        {{-- <div class="table-card staggered-entry" style="margin-top: 30px">
            <div class="table-card__header">
                <h3>Meilleurs clients</h3>
            </div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Adresse e-mail</th>
                        <th class="text-center">Nombre de commandes</th>
                        <th class="text-left">Dépenses totales</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($topCustomers as $customer)
                        <tr>
                            <td>
                                <div class="user-inline">
                                    <span class="avatar-sm">{{ mb_substr($customer->user->name, 0, 1) }}</span>
                                    {{ $customer->user->name }}
                                </div>
                            </td>
                            <td class="text-dim">{{ $customer->user->email }}</td>
                            <td class="text-center">{{ $customer->total_orders }}</td>
                            <td class="text-left" style="font-weight: 700; color: var(--color-gold)">
                                ${{ number_format($customer->total_spend, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> --}}
    </section>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const ctx = document.getElementById('revenueChart').getContext('2d');

                // Custom gradient for the chart
                const gradient = ctx.createLinearGradient(0, 0, 0, 300);
                gradient.addColorStop(0, 'rgba(212, 175, 55, 0.3)');
                gradient.addColorStop(1, 'rgba(212, 175, 55, 0)');

                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: {!! json_encode($revenueTrends['labels']) !!},
                        datasets: [{
                            label: 'Revenus',
                            data: {!! json_encode($revenueTrends['data']) !!},
                            borderColor: '#d4af37',
                            backgroundColor: gradient,
                            borderWidth: 3,
                            fill: true,
                            tension: 0.4,
                            pointBackgroundColor: '#d4af37',
                            pointBorderColor: 'rgba(255,255,255,0.2)',
                            pointRadius: 4,
                            pointHoverRadius: 6
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: {
                                    color: 'rgba(255, 255, 255, 0.05)'
                                },
                                ticks: {
                                    color: '#a0a5ba'
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                },
                                ticks: {
                                    color: '#a0a5ba'
                                }
                            }
                        }
                    }
                });
            });
        </script>
    @endpush
@endsection
