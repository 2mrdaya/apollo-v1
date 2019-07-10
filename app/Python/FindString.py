import sys
import re

def replace_strings(x):
    x = re.sub('\.', ' ', x,flags=re.IGNORECASE)
    x = re.sub('\:', ' ', x,flags=re.IGNORECASE)
    x = re.sub('\,', ' ', x,flags=re.IGNORECASE)
    x = re.sub('\-', ' ', x,flags=re.IGNORECASE)
    x = re.sub('b\/o', '', x,flags=re.IGNORECASE)
    x = re.sub('bo ', '', x,flags=re.IGNORECASE)
    x = re.sub('baby of', '', x,flags=re.IGNORECASE)
    x = re.sub('master', '', x,flags=re.IGNORECASE)
    x = re.sub('mast', '', x,flags=re.IGNORECASE)
    x = re.sub('mrs', '', x,flags=re.IGNORECASE)
    x = re.sub('mr', '', x,flags=re.IGNORECASE)
    x = re.sub('ms', '', x,flags=re.IGNORECASE)
    x = re.sub('patient ref', 'ref', x,flags=re.IGNORECASE)
    x = re.sub('patient to', 'to', x,flags=re.IGNORECASE)
    x = re.sub('patient from', 'from', x,flags=re.IGNORECASE)
    x = re.sub('patient by', 'by', x,flags=re.IGNORECASE)
    x = re.sub('afg', '', x,flags=re.IGNORECASE)
    x = re.sub(' +', ' ', x,flags=re.IGNORECASE)
    x = re.sub('to dr', '', x,flags=re.IGNORECASE)
    x = re.sub('under dr', '', x,flags=re.IGNORECASE)
    x = re.sub('in a\/c of', 'by', x,flags=re.IGNORECASE)
    return x

def find(x, search_values):
    try:
        x = replace_strings(x)

        fsname = midname = lsname = ''

        for search_value in search_values:
            if x.lower().find(search_value) >= 0:
                pt_idx = x.lower().find(search_value)
                searched_value = search_value
                #print(searched_value)
        x = x[pt_idx + len(searched_value) : 500]
        #print(x)
        #print(len(x.split()))

        if len(x.split()) > 0:
            fsname = x.split()[0]

        if len(x.split()) > 1:
            midname = x.split()[1]

        if len(x.split()) > 2:
            lsname = x.split()[2]

        #print("Hi")

        if len(re.findall('\d+',fsname)) :
            fsname = midname = lsname = ''

        if len(re.findall('\d+',midname)) :
            midname = lsname = ''

        if len(re.findall('\d+',lsname)) :
            lsname = ''

        if fsname.find('ref') >= 0 or fsname == 'name' or fsname == ',':
            fsname = midname
            midname = lsname
            lsname = ''

        if midname.find('ref') >= 0 or midname == ',' or midname == 'and' or midname == 'to' or midname == 'age' or midname == 'will' or midname == 'is' or midname == 'for' or midname == 'from':
            midname = ''
            lsname = ''

        if lsname.find('ref') >= 0 or lsname == ',' or lsname == 'and' or lsname == 'to' or lsname == 'age' or lsname == 'will' or lsname == 'is' or lsname == 'for' or lsname == 'from':
            lsname = ''
    except:
        return ''
    return (fsname + ' ' + midname + ' ' + lsname).strip()


def find_patient(x):
    search_values = ['patient ', 'pt ', 'pt pt', 'ptpt', 'pt patient', 'pt referring', 'referring patient', 'pt sending', 'sending patient', 'name ', 'name is']
    return find(x,search_values)

def find_avip(x):
    search_values = ['from', 'regard', 'regards', 'dr', 'by', 'by dr', 'by dr ' , 'hfc']
    return find(x,search_values)

if __name__ == "__main__":
    #print(sys.argv)
    print(locals()[sys.argv[1]](sys.argv[2]))
