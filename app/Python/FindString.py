import sys
import re

def find_patient(x):
    x = x.lower()
    x = re.sub('\.', ' ', x)
    x = re.sub('\-', ' ', x)
    x = re.sub('b\/o', ' ', x)
    x = re.sub('master', ' ', x)
    x = re.sub('mast', ' ', x)
    x = re.sub('mrs', '', x)
    x = re.sub('mr', '', x)
    x = re.sub('ms', '', x)
    x = re.sub('patient ref', 'ref', x)
    x = re.sub('afg', '', x)
    x = re.sub(' +', ' ', x)

    fsname = midname = lsname = ''
    name_idx = x.lower().find('name ')
    pt_idx = x.lower().find('pt ')
    pt_idx1 = x.lower().find('pt ', pt_idx+1)
    pt_idx2 = x.lower().find('pt.', pt_idx+1)
    pat_idx = x.lower().find('patient ')

    if pt_idx1 > 0:
        pt_idx = pt_idx1

    if pt_idx2 > 0:
        pt_idx = pt_idx2

    if name_idx >= 0 :
        fsname_end = x.lower().find(' ', name_idx + 5)
        fsname = x[name_idx + 5:fsname_end]
        midname_end = x.lower().find(' ', fsname_end + 1)
        midname = x[fsname_end + 1:midname_end]
        lsname_end = x.lower().find(' ', midname_end + 1)
        lsname = x[midname_end + 1:lsname_end]
        #print(fsname,midname,lsname)
    elif pat_idx >= 0 :
        fsname_end = x.lower().find(' ', pat_idx + 8)
        fsname = x[pat_idx + 8:fsname_end]
        midname_end = x.lower().find(' ', fsname_end + 1)
        midname = x[fsname_end + 1:midname_end]
        lsname_end = x.lower().find(' ', midname_end + 1)
        lsname = x[midname_end + 1:lsname_end]
        #print(fsname,midname,lsname)
    elif pt_idx >= 0 :
        fsname_end = x.lower().find(' ', pt_idx + 3)
        fsname = x[pt_idx + 3:fsname_end]
        midname_end = x.lower().find(' ', fsname_end + 1)
        midname = x[fsname_end + 1:midname_end]
        lsname_end = x.lower().find(' ', midname_end + 1)
        lsname = x[midname_end + 1:lsname_end]
        #print(fsname,midname,lsname)

    if len(re.findall('\d+',fsname)) :
        fsname = midname = lsname = ''

    if len(re.findall('\d+',midname)) :
        midname = lsname = ''

    if len(re.findall('\d+',lsname)) :
        lsname = ''

    if fsname.find('ref') >= 0 or fsname == ',':
        fsname = midname
        midname = lsname
        lsname = ''

    if midname.find('ref') >= 0 or midname == ',' or midname == 'and' or midname == 'to' or midname == 'age' or midname == 'will' or midname == 'is' or midname == 'for' or midname == 'from':
        midname = ''
        lsname = ''

    if lsname.find('ref') >= 0 or lsname == ',' or lsname == 'and' or lsname == 'to' or lsname == 'age' or lsname == 'will' or lsname == 'is' or lsname == 'for' or lsname == 'from':
        lsname = ''

    return (fsname + ' ' + midname + ' ' + lsname).strip()

def find_avip(x):
    x = x.lower()
    x = re.sub('\.', ' ', x)
    x = re.sub('\-', ' ', x)
    x = re.sub('b\/o', ' ', x)
    x = re.sub('master', ' ', x)
    x = re.sub('mast', ' ', x)
    x = re.sub('mrs', '', x)
    x = re.sub('mr', '', x)
    x = re.sub('ms', '', x)
    x = re.sub('patient ref', 'ref', x)
    x = re.sub('afg', '', x)
    x = re.sub(' +', ' ', x)
    x = re.sub('to dr', '', x)
    x = re.sub('under dr', '', x)
    x = re.sub('in a\/c of', 'by', x)

    fsname = midname = lsname =""

    name_idx = x.lower().find('by ')
    if name_idx >= 0 and x.lower().find('dr', name_idx + 3) >= 0:
        name_idx = x.lower().find('dr', name_idx + 3)
    elif x.lower().find('dr', x.lower().find('to dr ') + 5) >= 0 :
        name_idx = x.lower().find('to dr ')
        if x.lower().find('dr', name_idx + 5) >= 0:
            name_idx = x.lower().find('dr', name_idx + 5)

    by_idx = x.lower().find('by ')
    from_idx = x.lower().find('from ')
    reg_idx = x.lower().find('regards')
    dr_idx = x.lower().find('dr')

    #print(name_idx, by_idx, from_idx, reg_idx, dr_idx)

    if name_idx >= 0 :
        name = x[name_idx + 3:].split(' ')
        fsname = name[0]
        if len(name) > 1 :
            midname = name[1]
        if len(name) > 2 :
            lsname = name[2]
        #print(fsname,midname,lsname)
    elif by_idx >= 0 :
        name = x[by_idx + 3:].split(' ')
        fsname = name[0]
        if len(name) > 1 :
            midname = name[1]
        if len(name) > 2 :
            lsname = name[2]
    elif from_idx >= 0 :
        name = x[from_idx + 5:].split(' ')
        fsname = name[0]
        if len(name) > 1 :
            midname = name[1]
        if len(name) > 2 :
            lsname = name[2]
    elif reg_idx >= 0 :
        name = x[reg_idx + 9:].split(' ')
        fsname = name[0]
        if len(name) > 1 :
            midname = name[1]
        if len(name) > 2 :
            lsname = name[2]
    elif dr_idx >= 0 :
        name = x[dr_idx + 3:].split(' ')
        fsname = name[0]
        if len(name) > 1 :
            midname = name[1]
        if len(name) > 2 :
            lsname = name[2]

    if fsname == ',':
        fsname = midname
        midname = lsname
        lsname = ''

    if midname == ',' or midname == 'and' or midname == 'to' or midname == 'age' or midname == 'will' or midname == 'is' or midname == 'for' or midname == 'from':
        midname = ''
        lsname = ''

    if lsname == ',' or lsname == 'and' or lsname == 'to' or lsname == 'age' or lsname == 'will' or lsname == 'is' or lsname == 'for' or lsname == 'from':
        lsname = ''

    return (fsname + ' ' + midname + ' ' + lsname).strip()

if __name__ == "__main__":
    #print(sys.argv)
    print(locals()[sys.argv[1]](sys.argv[2]))
