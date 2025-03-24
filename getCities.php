<?php
$country = $_GET['country'] ?? '';

$cities = [];

switch ($country) {
    case 'Moldova':
        $cities = ['Chisinau', 'Tiraspol', 'Balti', 'Bender', 'Orhei', 'Cahul', 'Soroca', 'Comrat'];
        break;
    case 'Romania':
        $cities = ['Bucharest', 'Cluj-Napoca', 'Timisoara', 'Iasi', 'Constanta', 'Brasov', 'Craiova', 'Galati'];
        break;
    case 'Ukraine':
        $cities = ['Kyiv', 'Kharkiv', 'Odesa', 'Dnipro', 'Lviv', 'Zaporizhzhia', 'Vinnytsia', 'Kherson'];
        break;
    case 'Germany':
        $cities = ['Berlin', 'Munich', 'Hamburg', 'Frankfurt', 'Cologne', 'Stuttgart', 'Dresden', 'Leipzig'];
        break;
    case 'France':
        $cities = ['Paris', 'Marseille', 'Lyon', 'Toulouse', 'Nice', 'Nantes', 'Strasbourg', 'Bordeaux'];
        break;
    case 'Italy':
        $cities = ['Rome', 'Milan', 'Naples', 'Turin', 'Florence', 'Venice', 'Bologna', 'Genoa'];
        break;
    case 'Spain':
        $cities = ['Madrid', 'Barcelona', 'Valencia', 'Seville', 'Zaragoza', 'Malaga', 'Bilbao', 'Granada'];
        break;
    case 'Poland':
        $cities = ['Warsaw', 'Krakow', 'Lodz', 'Wroclaw', 'Poznan', 'Gdansk', 'Szczecin', 'Katowice'];
        break;
    case 'Netherlands':
        $cities = ['Amsterdam', 'Rotterdam', 'The Hague', 'Utrecht', 'Eindhoven', 'Groningen', 'Maastricht', 'Haarlem'];
        break;
    case 'Belgium':
        $cities = ['Brussels', 'Antwerp', 'Ghent', 'Bruges', 'Liege', 'Leuven', 'Namur', 'Mons'];
        break;
    case 'Austria':
        $cities = ['Vienna', 'Graz', 'Linz', 'Salzburg', 'Innsbruck', 'Klagenfurt', 'Bregenz', 'Villach'];
        break;
    case 'Czech Republic':
        $cities = ['Prague', 'Brno', 'Ostrava', 'Plzen', 'Liberec', 'Olomouc', 'Ceske Budejovice', 'Hradec Kralove'];
        break;
    case 'Hungary':
        $cities = ['Budapest', 'Debrecen', 'Szeged', 'Miskolc', 'Pecs', 'Gyor', 'Nyiregyhaza', 'Kecskemet'];
        break;
    case 'Slovakia':
        $cities = ['Bratislava', 'Kosice', 'Presov', 'Nitra', 'Zilina', 'Banska Bystrica', 'Trnava', 'Martin'];
        break;
    case 'Bulgaria':
        $cities = ['Sofia', 'Plovdiv', 'Varna', 'Burgas', 'Ruse', 'Stara Zagora', 'Pleven', 'Sliven'];
        break;
    case 'Greece':
        $cities = ['Athens', 'Thessaloniki', 'Patras', 'Heraklion', 'Larissa', 'Volos', 'Rhodes', 'Chania'];
        break;
    case 'Portugal':
        $cities = ['Lisbon', 'Porto', 'Braga', 'Coimbra', 'Faro', 'Aveiro', 'Funchal', 'Ponta Delgada'];
        break;
    case 'Sweden':
        $cities = ['Stockholm', 'Gothenburg', 'Malmo', 'Uppsala', 'Linkoping', 'Vasteras', 'Orebro', 'Helsingborg'];
        break;
    case 'Finland':
        $cities = ['Helsinki', 'Espoo', 'Tampere', 'Vantaa', 'Oulu', 'Turku', 'Lahti', 'Kuopio'];
        break;
    case 'Denmark':
        $cities = ['Copenhagen', 'Aarhus', 'Odense', 'Aalborg', 'Esbjerg', 'Randers', 'Kolding', 'Horsens'];
        break;
    case 'Ireland':
        $cities = ['Dublin', 'Cork', 'Limerick', 'Galway', 'Waterford', 'Drogheda', 'Swords', 'Bray'];
        break;
    case 'Lithuania':
        $cities = ['Vilnius', 'Kaunas', 'Klaipeda', 'Siauliai', 'Panevezys', 'Alytus', 'Marijampole', 'Mazeikiai'];
        break;
    case 'Latvia':
        $cities = ['Riga', 'Daugavpils', 'Liepaja', 'Jelgava', 'Jurmala', 'Ventspils', 'Rezekne', 'Valmiera'];
        break;
    case 'Estonia':
        $cities = ['Tallinn', 'Tartu', 'Narva', 'Parnu', 'Kohtla-Jarve', 'Viljandi', 'Rakvere', 'Maardu'];
        break;
    default:
        $cities = [];
        break;
}

header('Content-Type: application/json');
echo json_encode($cities);
?>