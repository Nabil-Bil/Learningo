<x-guest-layout>
    <script>
        callFrame = window.DailyIframe.createFrame({
        showLeaveButton: true,
        showFullscreenButton: true,
        subscribeToTracksAutomatically:true,
        iframeStyle: {
        position: 'fixed',
        width: '100%',
        height: '100%',
        'z-index':'500',
    },
        });
        callFrame.setTheme({
            light: {
    colors: {
      accent: '#286DA8',
    },
  },
  dark: {
    colors: {
      accent: '#E83551',
    },
  },
        })

        callFrame.join({ url: '{{ $url }}'})

    </script>
</x-guest-layout>