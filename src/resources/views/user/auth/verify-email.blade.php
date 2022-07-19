<x-guest-layout>
    <x-auth-card>
        <div>
            {{ __('サインアップありがとうございます。ご登録の前に、メールでお送りしたリンクをクリックして、メールアドレスの確認をしていただけますか？もしメールが届いていない場合は、再度お送りします。') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div>
                {{ __('登録時に入力されたメールアドレスに、新しい認証リンクが送信されました。') }}
            </div>
        @endif

        <div>
            <form method="POST" action="{{ route('user.verification.send') }}">
                @csrf

                <div>
                    <x-button>
                        {{ __('認証メール再送信') }}
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('user.logout') }}">
                @csrf

                <button type="submit">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>


