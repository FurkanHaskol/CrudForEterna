Proje Adı: TODO Uygulaması

Proje Tanımı:
Bu proje, bir TODO (Yapılacaklar Listesi) uygulamasının istediğiniz framework'ü kullanılarak geliştirilmesini içermektedir. Uygulama, kullanıcının yapılacak işleri takip etmesine ve yönetmesine olanak tanıyan bir arayüz sunmalıdır.

Özellikler:

Kullanıcı Kaydı: Kullanıcılar uygulamaya kaydolarak bir hesap oluşturabilmelidir. Kullanıcı adı, e-posta adresi ve şifre gibi temel bilgileri girmeleri gerekmektedir.

Oturum Açma: Kayıtlı kullanıcılar, kullanıcı adı ve şifreleriyle oturum açabilmelidir.

Yapılacaklar Listesi: Kullanıcılar, yapılacak işleri eklemek, düzenlemek, silmek ve işleri tamamladıklarında işaretlemek için bir yapılacaklar listesi oluşturabilmelidir. Her bir yapılacak iş, bir başlık, açıklama, tarih ve öncelik seviyesi gibi özelliklere sahip olmalıdır.

Yapılacakları Kategorize Etme: Kullanıcılar, yapılacakları kategorilere ayırabilmeli ve kategorilere göre filtreleme yapabilmelidir. Örnek kategoriler arasında "İş", "Kişisel", "Alışveriş" gibi başlıklar yer alabilir.

Hatırlatıcılar: Kullanıcılar, yapılacak işler için hatırlatıcılar ekleyebilmelidir. Hatırlatıcılar, kullanıcıya belirli bir tarihte ve saatte işi tamamlaması için bildirimler göndermelidir.

Kullanıcı Profili: Kullanıcılar, profil sayfasından kişisel bilgilerini düzenleyebilmeli ve profillerine avatar ekleyebilmelidir.

Arama ve Sıralama: Kullanıcılar, yapılacak işleri başlık, öncelik, tarih vb. özelliklere göre arayabilmeli ve sıralayabilmelidir.

Not: CRUD işlemleri için verilerin uçtan uca şifrelenmesi ekstra olarak değerlendirilecektir. Örneğin api/todo/getById isimli bir endpointte frontend tarafta id verisi AES ile şifrelenerek gönderilir ve backend tarafta tekrar AES ile çözümlenerek tracking işlemlerine karşı koruma sağlanmış olur. Bu işlem mecburi değildir, eğer gerçekleştirilir ise ekstra olarak değerlendirilecektir.