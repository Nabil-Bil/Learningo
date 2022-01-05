<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="container m-auto mt-20">
        <div id="chart" style="height: 300px;"></div>
    </div>
    
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
    <script>
        const chart = new Chartisan({
          el: '#chart',
          url: "@chart('user_chart')",
          hooks: new ChartisanHooks()
          .colors(['#4ade80','#0ea5e9','#e11d48'])
          .legend({})
          .title('Chart about Users')

        });
      </script>

    
</x-app-layout>