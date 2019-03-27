from bs4 import BeautifulSoup
from selenium import webdriver
from time import sleep
import csv


options = webdriver.ChromeOptions()
# options.add_argument('headless')

driver = webdriver.Chrome(executable_path='driver/chromedriver_mac', chrome_options=options)

areas = ['Gulshan', 'Dhanmondi', 'Banani', 'Bashundhara', 'Uttara', 'Mirpur']

url = 'http://harriken.com/'

def extract_features(page_source, loc):
    html = driver.page_source
    soup = BeautifulSoup(html, features="lxml")
    lis = soup.findAll("li", class_="list__collection__item")
    for li in lis:
        restaurant_link = li.findAll("a")[0]
        restauran_rating = 0.0
        if(restaurant_link.has_attr('href')):
            restaurant_link = restaurant_link['href']
            restaurant_name = li.findAll("h4", class_="list__collection__item__hl")[0].text
            restaurant_type = li.findAll("span", class_="list__collection__item__info")[0].text
            restaurant_location = loc
            restaurant_thumbnail = li.findAll("figure", class_="list__collection__item__fig")[0]['style']
            ii = restaurant_thumbnail.find('("')
            jj = restaurant_thumbnail.find('")')

            restaurant_thumbnail = restaurant_thumbnail[ii + len("('") : jj]

            if(li.findAll("span", class_="list__collection__item__badge badge badge--secondary")):
                restauran_rating = float(li.findAll("span", class_="list__collection__item__badge badge badge--secondary")[0].text)
                
            # print(restaurant_name)
            # print(restaurant_type)
            # print(restaurant_location)
            # print(restaurant_link)
            # print(restaurant_thumbnail)
            # print(restauran_rating)
            
            # print('-------')
            result = (restaurant_name.encode('utf-8').strip(), restaurant_type, restaurant_location, restaurant_link, restaurant_thumbnail, restauran_rating)
            # with open('restaurant_data_file.csv', mode='a') as res_file:
            #     csv_writer = csv.writer(res_file, delimiter=',', quotechar='"', quoting=csv.QUOTE_MINIMAL)
            #     csv_writer.writerow([result[0], result[1], result[2], result[3], result[4], result[5]])

    return (restaurant_name, restaurant_type, restaurant_location, restaurant_link, restaurant_thumbnail, restauran_rating)


for area in areas:
    url = 'http://harriken.com/search?q=&l='+ area +'#!page=1'
    driver.get(url)
    sleep(1)
    extract_features(driver.page_source, area)
    html = driver.page_source
    soup = BeautifulSoup(html, features="lxml")
    total_pages = int(soup.findAll("span", class_="total-page")[0].text)


    for i in range(2, total_pages + 1):
        url = 'http://harriken.com/search?q=&l='+ area +'#!page=' + str(i)
        driver.get(url)
        sleep(1)
        result = extract_features(driver.page_source, area)
        


    # print(total_pages)
    break






# driver.save_screenshot("screenshot.png")